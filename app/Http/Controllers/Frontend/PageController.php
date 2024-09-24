<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(): View
    {
        $cars = Car::all();
        $brands = Car::distinct()->pluck('brand');
        $models = Car::distinct()->pluck('model');
        $years = Car::distinct()->pluck('year');
        $types = Car::distinct()->pluck('car_type');
        return view('frontend.home.index', compact('cars', 'brands', 'models', 'years', 'types'));
    }

    public function getCars(Request $request)
    {
        $query = Car::query();

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }
        if ($request->filled('model')) {
            $query->where('model', $request->model);
        }
        if ($request->filled('type')) {
            $query->where('car_type', $request->type);
        }
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }
        if ($request->filled('price')) {
            $query->where('daily_rent_price', '<=', $request->price);
        }

        $cars = $query->get();

        return response()->json($cars);
    }


    public function about(): View
    {
        return view('about');
    }

    public function contact(): View
    {
        return view('frontend.contact.index');
    }

    public function rentals(): View
    {
        return view('rentals');
    }

    public function carDetails($id): View{
        $car = Car::findOrfail($id);
        return view('frontend.cars.details', compact('car'));
    }
}
