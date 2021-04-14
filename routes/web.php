<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/weather/{cityName}', [WeatherController::class, 'getWeatherDataByCity']);
