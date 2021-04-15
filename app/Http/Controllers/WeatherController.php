<?php

namespace App\Http\Controllers;

use App\Service\WeatherApiService;
use Illuminate\Http\Response;

class WeatherController extends Controller
{

    public function getWeatherDataByCity(string $cityName): Response
    {
        $weatherApi = new WeatherApiService($cityName);
        
        return new Response(
            $weatherApi->getApiData()
        );
    }

}
