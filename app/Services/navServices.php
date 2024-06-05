<?php
namespace App\Services;

use App\Traits\ConsumesExternalService;

class navServices
{
    use ConsumesExternalService;

    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.navigation.base_uri');
    }

    public function getloc($lat, $lng){

        $queryParams = [
            'lat' => $lat,
            'lng' => $lng,
        ];
        return $this->performRequest('GET', 'geocode/latlng', $queryParams);
    }

    public function getPlace($placeid) {
        $queryParams = ['placeid'=>$placeid];
        return $this->performRequest('GET',('/geocode/placeid'),$queryParams);
    }

    public function getAddress($address){
        $queryParams = ['address'=> $address];
        return $this->performRequest('GET', ('/geocode/address'), $queryParams);
    }

}