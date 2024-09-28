<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $car_count = Car::count();
        $car_available = Car::where('availability',1)->count();
        $total_rental = Rental::whereNotIn('status', [4])->count();
        $total_income = Rental::where('status',[2,3])->sum('total_cost');
        return view('backend.dashboard', compact('car_count','car_available','total_rental','total_income'));
    }
}
