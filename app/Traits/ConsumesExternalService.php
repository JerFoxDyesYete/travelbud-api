<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalService
{
    public function performRequest($method, $requestUrl, $queryParams = [], $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        $response = $client->request($method, $requestUrl, [
            'query' => $queryParams,
            'form_params' => $formParams,
            'headers' => $headers,
        ]);

        return $response->getBody()->getContents();
    }
}
