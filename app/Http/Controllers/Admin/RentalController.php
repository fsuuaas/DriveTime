<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RentalStatusEnum;
use App\Http\Controllers\Controller;
use App\Mail\RentalBookingAdminMail;
use App\Mail\RentalBookingUserMail;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Rental::with('car','user')
                ->join('cars', 'rentals.car_id', '=', 'cars.id')
                ->join('users', 'rentals.user_id', '=', 'users.id')
                ->select('rentals.*', 'cars.name as car_name', 'cars.brand as brand', 'cars.image as image','users.name as name', 'users.phone as phone');


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
                    return view('backend.rentals._actions', compact('model'));
                })
                ->rawColumns(['image','status','actions'])
                ->toJson();
        }

        return view('backend.rentals.index');
    }

    public function create(){
        $cars = Car::all();
        return view('backend.rentals.create', compact('cars'));
    }

    public function store(Request $request)
    {
      //  dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'address' => 'required'
        ]);

     //  dd($validated);

        $car = Car::find($validated['car_id']);
        if (!$car) {
            return response()->json(['error' => 'Car not found'], 404);
        }

        // Check if car is available in the requested period
        if (!$car->isAvailableForDates($validated['start_date'], $validated['end_date'])) {
            return response()->json(['error' => 'Car is not available for the requested dates'], 400);
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make('P@ssw0rd'),
            'phone' => $validated['phone'],
            'address' => $validated['address']
        ]);

        $rental = Rental::create([
            'car_id' => $car->id,
            'user_id' => $user->id,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_cost' => $this->calculateRentalCost($validated['start_date'], $validated['end_date'], $car->daily_rent_price),
            'status' => RentalStatusEnum::Booked
        ]);

        $car->markAsUnavailable();

        // Notification process
        Mail::to($user->email)->send(new RentalBookingUserMail($rental));
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            Mail::to($admin->email)->send(new RentalBookingAdminMail($rental));
        }

        return redirect()->route('admin.rentals.index')->with('success', 'Booking created successfully!');
    }


    public function edit(Rental $rental)
    {
        $cars = Car::all();
        return view('backend.rentals.edit', compact('rental', 'cars'));
    }

    public function update(Request $request, Rental $rental)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'phone' => 'required|regex:/^\+?\d{10,15}$/',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'address' => 'required'
        ]);

      //  dd($validated);

        $car = Car::find($validated['car_id']);
        if (!$car) {
            return redirect()->route('admin.rentals.index')->with('error', 'Car not found!');
        }

        // Check if car is available in the requested period, excluding the current rental
        if (!$car->isAvailableForDatesExcludingRental($validated['start_date'], $validated['end_date'], $rental->id)) {
            return redirect()->route('admin.rentals.index')->with('error', 'Car is not available for the requested dates!');
        }

        // Update user details
        $user = $rental->user;
        $user->update([
            'phone' => $validated['phone'],
            'address' => $validated['address']
        ]);

        // Update the rental
        $rental->update([
            'car_id' => $validated['car_id'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_cost' => $this->calculateRentalCost($validated['start_date'], $validated['end_date'], $car->daily_rent_price)
        ]);

        $car->markAsUnavailable();

        return redirect()->route('admin.rentals.index')->with('success', 'Booking updated successfully!');
    }


    private function calculateRentalCost($startDate, $endDate, $dailyRentPrice): float
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        $totalDays = $start->diffInDays($end) + 1;

        $totalCost = $totalDays * $dailyRentPrice;
        return round($totalCost, 2);
    }

    public function cancel($id){
        $rental = Rental::findOrFail($id);
        return view('backend.rentals.cancel', compact('rental'));
    }

    public function cancelRental(Request $request){
        $request->validate([
            'remark' => 'required|string',
        ]);

        $rental = Rental::findOrFail($request->rental_id);

        $rental->update([
            'remark' => $request->remark,
            'status' => RentalStatusEnum::Cancelled
        ]);

        return redirect()->route('admin.rentals.index')->with('success', 'Rental has been cancelled!');
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully.');
    }

}
