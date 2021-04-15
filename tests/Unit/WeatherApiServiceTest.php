<?php

namespace Tests\Unit;

use App\Repositories\WeatherRepository;
use App\Service\WeatherApiService;
use PHPUnit\Framework\TestCase;

class WeatherApiServiceTest extends TestCase
{

    public function testAttributeWeatherApiService()
    {
        $this->assertClassHasAttribute('cityName', WeatherApiService::class);
    }

    /**
     * @depends testAttributeWeatherApiService
     */
    public function testMethodsWeatherApiService()
    {

        $this->assertTrue(method_exists(WeatherApiService::class, 'getApiData'), "The 'getApiData()' method is missing ");
        $this->assertTrue(method_exists(WeatherApiService::class, 'getApiResponseData'), "The 'getApiResponseData()' method is missing ");
    }

    /**
     * @depends testAttributeWeatherApiService
     */
    public function testConstructWeatherApiService()
    {
        $weather = new WeatherApiService('paris');
        $this->assertEquals('paris', $weather->getCityName(), "Error in the 'getCityName()' method ");

        $this->assertFalse(isset($weather->cityName), 'Attribute "cityName" must be private.');
        $this->assertFalse(!WeatherApiService::API_URL);
        $this->assertFalse(!WeatherApiService::API_KEY);
        $this->assertFalse(!WeatherApiService::CACHE_TIME);
    }


}
