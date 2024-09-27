<?php

namespace App\Http\Controllers\Admin;

use App\Enums\RentalStatusEnum;
use App\Mail\RentalBookingAdminMail;
use App\Mail\RentalBookingUserMail;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class UserController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = User::with('rentals')
                ->select('*')->where('role', 'customer');

            return DataTables::eloquent($model)
                ->addColumn('actions', function ($model) {
                    return view('backend.customers._actions', compact('model'));
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        return view('backend.customers.index');
    }

    public function show(User $user){
        return view('backend.customers.show', compact('user'));
    }

    public function create(){
        return view('backend.customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'address' => 'required'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make('P@ssw0rd'),
            'phone' => $validated['phone'],
            'address' => $validated['address']
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Customer created successfully!');
    }

    public function edit(User $user){
        return view('backend.customers.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'phone' => 'required|unique:users,phone,' . $user->id,
            'address' => 'required'
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address']
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Customer deleted successfully!');
    }

}
