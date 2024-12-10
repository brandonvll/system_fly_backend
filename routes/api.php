<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\FlightController;

Route::middleware('api')->group(function () {
    Route::post('/airports', [AirportController::class, 'getAirportsByCity']);
    Route::post('/flights', [FlightController::class, 'searchFlights']);
    Route::post('/reserve', [FlightController::class, 'reserveWithItinerarie']);
});

