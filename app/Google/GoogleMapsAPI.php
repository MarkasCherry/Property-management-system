<?php

namespace App\Google;

use Illuminate\Support\Facades\Http;

class GoogleMapsAPI
{
    private $data;

    public function setLocation($address)
    {
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . '&key='. env('GOOGLE_API_KEY');
        $this->data = json_decode(Http::get($url)->getBody())->results[0] ?? null;
    }

    public function getData()
    {
        return $this->data;
    }
}
