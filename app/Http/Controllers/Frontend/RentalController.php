<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\RentalStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\RentalBookingUserMail;
use App\Mail\RentalBookingAdminMail;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class RentalController extends Controller
{
    public function bookingForm($id){
        $car = Car::find($id);
        return view('frontend.dashboard.booking-form', compact('car'));
    }

    public function booking(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'phone' => 'required|regex:/^\+?\d{10,15}$/',
            'startDate' => 'required|date|before:endDate',
            'endDate' => 'required|date|after:startDate',
            'address' => 'required'
        ]);

        $car = Car::find($validated['car_id']);
        if (!$car) {
            return response()->json(['error' => 'Car not found'], 404);
        }

        // Check if car is available in the requested period
        if (!$car->isAvailableForDates($validated['startDate'], $validated['endDate'])) {
            return redirect()->route('customer.dashboard')->with('error', 'Car is not available for the requested dates!');
        }

        $user = auth()->user();
        $user->update([
            'phone' => $validated['phone'],
            'address' => $validated['address']
        ]);

        $rental = Rental::create([
            'car_id' => $car->id,
            'start_date' => $validated['startDate'],
            'end_date' => $validated['endDate'],
            'total_cost' => $this->calculateRentalCost($validated['startDate'], $validated['endDate'], $car->daily_rent_price),
            'status' => RentalStatusEnum::Booked
        ]);

        $car->markAsUnavailable();

        // Notification process
        Mail::to($user->email)->send(new RentalBookingUserMail($rental));
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new RentalBookingAdminMail($rental));
        }
        return redirect()->route('customer.dashboard')->with('success', 'Booking created successfully!');
    }


    private function calculateRentalCost($startDate, $endDate, $dailyRentPrice): float
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        $totalDays = $start->diffInDays($end) + 1;

        $totalCost = $totalDays * $dailyRentPrice;
        return round($totalCost, 2);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Rental::with('car','user')
                ->join('cars', 'rentals.car_id', '=', 'cars.id')
                ->join('users', 'rentals.user_id', '=', 'users.id')
                ->select('rentals.*', 'cars.name as car_name', 'cars.brand as brand', 'cars.image as image','users.name as name', 'users.phone as phone')
                ->where('rentals.user_id', auth()->id());


            if ($request->has('status') && !empty($request->input('status'))) {
                $model->where('rentals.status', $request->input('status'));
            }


            return DataTables::eloquent($model)
                ->addColumn('image', function ($model) {
                    return '<div class="car-img">
                                <img src="' . asset($model->image) . '" alt="Bootstrap Gallery">
                            </div>';
                })
                ->addColumn('total_cost', function ($model) {
                    return "$" . number_format($model->total_cost, 2);
                })
                ->addColumn('status', function ($model) {
                    return $model->status->getLabelHTML();
                })
                ->addColumn('actions', function ($model) {
                    return view('frontend.dashboard._actions', compact('model'));
                })
                ->rawColumns(['image','status','actions'])
                ->toJson();
        }

        return view('frontend.dashboard.rentals');
    }

    public function getCancel($id){
        $rental = Rental::find($id);
        return view('frontend.dashboard.cancel', compact('rental'));
    }

    public function cancel(Request $request, $id){
        $request->validate([
            'remark' => 'required|string',
        ]);

        $rental = Rental::findOrFail($id);

        $rental->update([
            'remark' => $request->remark,
            'status' => RentalStatusEnum::Cancelled
        ]);

        return redirect()->route('customer.dashboard')->with('success', 'Rental cancelled successfully!');
    }

    public function edit($id)
    {
        $cars = Car::all();
        $rental = Rental::with('car')->find($id);
        return view('frontend.dashboard.edit', compact('rental', 'cars'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ]);

        //  dd($validated);

        $rental = Rental::find($validated['rental_id']);

        $car = Car::find($validated['car_id']);
        if (!$car) {
            return redirect()->route('customer.rentals')->with('error', 'Car not found!');
        }

        // Check if car is available in the requested period, excluding the current rental
        if (!$car->isAvailableForDatesExcludingRental($validated['start_date'], $validated['end_date'], $rental->id)) {
            return redirect()->route('customer.rentals')->with('error', 'Car is not available for the requested dates!');
        }


        // Update the rental
        $rental->update([
            'car_id' => $validated['car_id'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_cost' => $this->calculateRentalCost($validated['start_date'], $validated['end_date'], $car->daily_rent_price)
        ]);

        $car->markAsUnavailable();

        return redirect()->route('customer.rentals')->with('success', 'Booking updated successfully!');
    }


}
