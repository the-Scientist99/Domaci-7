<?php

use App\Http\Controllers\AvailabilitySearchController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [VehicleController::class, 'index']);
    Route::resource('/vehicles', VehicleController::class);
    Route::resource('/clients', ClientController::class);
    Route::resource('/reservations', ReservationController::class);
    Route::resource('/availability-search', AvailabilitySearchController::class);
});

require __DIR__ . '/auth.php';
