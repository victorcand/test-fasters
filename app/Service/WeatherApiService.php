<?php

namespace App\Service;

use App\Repositories\WeatherRepository;
use GuzzleHttp\Client;

class WeatherApiService
{
    const API_URL = "https://api.openweathermap.org/data/2.5/weather";
    const API_KEY = 'cba55aa478588da63903d44a866ba92b';
    const CACHE_TIME = 20;
    private $cityName;

    public function __construct(string $cityName)
    {
        $this->cityName = $cityName;
    }

    public function getApiData(): array
    {
        $weatherInCache = WeatherRepository::getDataWithCityNameAndCreatedAtDiff($this->cityName, self::CACHE_TIME);
        if (!empty($weatherInCache)) {
            return json_decode($weatherInCache->city_data, true);
        }
        $apiResponse = $this->getApiResponseData();

        WeatherRepository::createWeatherByCityNameAndData($this->cityName, $apiResponse);

        return $apiResponse;
    }

    private function getApiResponseData(): array
    {
        $apiUrl = self::API_URL . "?q={$this->cityName}&appid=" . self::API_KEY;
        $client = new Client();
        $res = $client->get($apiUrl);

        return json_decode($res->getBody()->getContents(), true);
    }

    public function getCityName()
    {
        return $this->cityName;
    }
}
