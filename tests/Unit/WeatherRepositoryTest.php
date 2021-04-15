<?php

namespace Tests\Unit;

use App\Repositories\WeatherRepository;
use PHPUnit\Framework\TestCase;

class WeatherRepositoryTest extends TestCase
{
    public function testMethodsWeatherRepository()
    {
        $this->assertTrue(method_exists(WeatherRepository::class,'getDataWithCityNameAndCreatedAtDiff'),"The 'getApiData()' method is missing ");
        $this->assertTrue(method_exists(WeatherRepository::class,'createWeatherByCityNameAndData'),"The 'getApiResponseData()' method is missing ");
    }
}
