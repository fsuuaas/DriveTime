<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\RentalStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index(){
        $car_count = Car::count();
        $car_available = Car::where('availability',1)->count();
        $total_rental = Rental::whereNotIn('status', [4])->where('user_id', auth()->user()->id)->count();
        $booked_rental = Rental::where('status', RentalStatusEnum::Booked)->where('user_id', auth()->user()->id)->count();
        $completed_rental = Rental::where('status', RentalStatusEnum::Completed)->where('user_id', auth()->user()->id)->count();
        $total_spend = Rental::where('status',[2,3])->where('user_id', auth()->user()->id)->sum('total_cost');

        return view('frontend.dashboard.dashboard-content', compact('car_count', 'booked_rental','completed_rental', 'total_rental', 'total_spend'));
    }
}
