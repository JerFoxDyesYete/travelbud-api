<?php
namespace App\Http\Controllers;

use App\Services\navServices;
use Illuminate\Http\Request;

class navController extends Controller
{
    protected $navServices;

    public function __construct(navServices $navServices)
    {
        $this->navServices = $navServices;
    }

    public function getByLatLng(Request $request)
    {
        $lat = $request->input('lat');
        $lng = $request->input('lng');
        return $this->navServices->getloc($lat, $lng);
    }

    public function getByPlaceId(Request $request)
    {
        $placeid = $request->input('placeid');
        return $this->navServices->getPlace($placeid);
    }

    public function getByAddress (Request $request){
        $address = $request->input('address');
        return $this->navServices->getAddress($address);
    }
}