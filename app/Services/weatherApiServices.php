<?php
namespace App\Services;

use App\Traits\ConsumesExternalService;

class weatherApiServices
{
    use ConsumesExternalService;

    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.weather.base_uri');
    }

    public function getCurrentWeather($location)
    {
        $queryParams = ['location' => $location];
        return $this->performRequest('GET', '/weather', $queryParams);
    }

    public function getForecast($location)
    {
        $queryParams = ['location' => $location];
        return $this->performRequest('GET', '/weather-forecast', $queryParams);
    }

    public function getHistory($location, $date){
        $queryParams=['location' => $location];
        $queryParams=['date'=> $date];
        return $this->performRequest('GET','/weather-history', $queryParams);
    }
}
