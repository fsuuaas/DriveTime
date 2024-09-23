<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Car::with('rentals')
                ->select('*');

            //dd($model);


            return DataTables::eloquent($model)
                ->addColumn('image', function ($model) {
                    return view('backend.cars._image', compact('model'));
                })
                ->addColumn('availability', function ($model) {
                    return view('backend.cars._status', compact('model'));
                })
                ->addColumn('actions', function ($model) {
                    return view('backend.cars._actions', compact('model'));
                })
                ->rawColumns(['image','status','actions'])
                ->toJson();
        }

        return view('backend.cars.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'car_type' => 'required|string|in:SUV,Sedan',
            'daily_rent_price' => 'required|numeric|min:0',
            'file.*' => 'mimes:jpg,jpeg,png|max:1024', // Each image should be max 10MB
        ]);

        // Create a new Car entry
        $car = new Car();
        $car->name = $request->input('name');
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->car_type = $request->input('car_type');
        $car->daily_rent_price = $request->input('daily_rent_price');
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $destinationPath = public_path('cars');
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $car->image = 'cars/' . $fileName;
        }
        $car->availability = 1;
        $car->save();
        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return view('backend.cars.show', compact('car'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('backend.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'car_type' => 'required|string|in:SUV,Sedan',
            'daily_rent_price' => 'required|numeric|min:0',
            'file.*' => 'mimes:jpg,jpeg,png|max:1024', // Each image should be max 1MB
        ]);

        // Find the existing Car entry
        $car = Car::findOrFail($id);

        // Update car properties
        $car->name = $request->input('name');
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->car_type = $request->input('car_type');
        $car->daily_rent_price = $request->input('daily_rent_price');

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete the old image if necessary
            if ($car->image) {
                $oldImagePath = public_path($car->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $file = $request->file('file');
            $destinationPath = public_path('cars');
            $fileName = $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $car->image = 'cars/' . $fileName; // Update the image path
        }

        $car->availability = 1; // You can modify this logic as needed
        $car->save();

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }
}
