<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\CustomerDashboardController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\RentalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/rentals', [PageController::class, 'rentals'])->name('rentals');
Route::get('/car/details/{id}', [PageController::class, 'carDetails'])->name('car.details');
Route::get('/cars1', [PageController::class, 'cars'])->name('cars');
Route::get('/cars/all', [PageController::class, 'getCars'])->name('cars.all');


Auth::routes();


Route::get('/logout', [LoginController::class, 'logout'])->name('logout.custom');




Route::group(['middleware' => ['auth', 'customer', 'check.auth'], 'prefix' => 'customer'], function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    Route::get('/car/{id}/booking', [RentalController::class, 'bookingForm'])->name('customer.rental.booking.from');
    Route::post('/car/{id}/booking', [RentalController::class, 'booking'])->name('customer.rental.booking');
    Route::get('/rentals', [RentalController::class, 'index'])->name('customer.rentals');
    Route::get('/rentals/cancel/{id}', [RentalController::class, 'getCancel'])->name('customer.rentals.get-cancel');
    Route::post('/rentals/cancel/{id}', [RentalController::class, 'cancel'])->name('customer.rentals.cancel');
    Route::get('/rentals/edit/{id}', [RentalController::class, 'edit'])->name('customer.rentals.edit');
    Route::post('/rentals/update', [RentalController::class, 'update'])->name('customer.rentals.update');
});

//require base_path('routes/admin.php');
require __DIR__ . '/admin.php';
