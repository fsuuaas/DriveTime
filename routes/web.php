<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/rentals', [PageController::class, 'rentals'])->name('rentals');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout.custom');


Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('cars', CarController::class)->names('admin.cars');
    Route::get('/get/car-list', [CarController::class, 'carList'])->name('admin.cars.list');
    Route::get('/car/view/{id}', [CarController::class, 'view'])->name('admin.car.view');
});
