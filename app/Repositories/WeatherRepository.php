<?php

namespace App\Repositories;

use App\Models\Weather;
use Carbon\Carbon;

class WeatherRepository
{
    public static function getDataWithCityNameAndCreatedAtDiff(string $cityName, int $minutesDiff): ?Weather
    {
        $diffDate = new Carbon();
        $diffDate->subMinutes($minutesDiff);
        
        return Weather::where('city_name', strtolower($cityName))
            ->where('created_at', '>=', $diffDate)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public static function createWeatherByCityNameAndData(string $cityName, array $cityData): void
    {

        $weather = new Weather();
        $weather->city_name = strtolower($cityName);
        $weather->city_data = json_encode($cityData);
        $weather->save();

        return;
    }
}
