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
            return response()->json(['error' => 'Car is not available for the requested dates'], 400);
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

        return response()->json([
            'message' => 'Booking successful!',
            'rental' => $rental
        ]);
    }


    private function calculateRentalCost($startDate, $endDate, $dailyRentPrice): float
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);

        $totalDays = $start->diffInDays($end) + 1;

        $totalCost = $totalDays * $dailyRentPrice;
        return round($totalCost, 2);
    }

}
