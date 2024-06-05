<?php
namespace App\Http\Controllers;

use App\Services\weatherApiServices;
use Illuminate\Http\Request;

class weatherApiController extends Controller
{
    protected $weatherApiServices;

    public function __construct(weatherApiServices $weatherApiServices)
    {
        $this->weatherApiServices = $weatherApiServices;
    }


    //get current weather from weather api
    //param location(value)
    public function current(Request $request)
    {
        $location = $request->input('location');
        return $this->weatherApiServices->getCurrentWeather($location);
    }

    //get weather forecast from weather api
    //param location(value)
    public function forecast(Request $request)
    {
        $location = $request->input('location');
        return $this->weatherApiServices->getForecast($location);
    }

    //get weather history for weather api
    //param location and date (yy-mm-dd)

    public function history (Request $request)
    {
        $location =$request->input('location');
        $date =$request->input('date');
        return $this->weatherApiServices->getHistory($location, $date);
    }
}
