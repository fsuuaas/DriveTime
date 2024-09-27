<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('cars', CarController::class)->names('admin.cars');
    Route::get('/car/view/{id}', [CarController::class, 'view'])->name('admin.car.view');
    Route::get('rentals/cancel/{rentals}', [RentalController::class, 'cancel'])->name('admin.rentals.cancel');
    Route::post('rentals/cancel', [RentalController::class, 'cancelRental'])->name('admin.rentals.cancel.post');
    Route::resource('rentals', RentalController::class)->names('admin.rentals');
    Route::resource('users', UserController::class)->names('admin.users');
});
