<?php

namespace App\Services;

use Geocoder\Query\GeocodeQuery;
use Geocoder\Provider\Nominatim\Nominatim;
use Geocoder\StatefulGeocoder;
use Http\Client\Curl\Client as CurlClient;
use Http\Adapter\Guzzle7\Client as GuzzleClient;
use Nyholm\Psr7\Factory\Psr17Factory;

class GeocodingService
{
    protected $geocoder;

    public function __construct()
    {
        $httpClient = new GuzzleClient();
        $psr17Factory = new Psr17Factory();

        $provider = Nominatim::withOpenStreetMapServer($httpClient, 'LaravelApp/1.0');
        $this->geocoder = new StatefulGeocoder($provider, 'en');
    }

    public function getCoordinates(string $address): ?array
    {
        $results = $this->geocoder->geocodeQuery(GeocodeQuery::create($address));

        if ($results->isEmpty()) return null;

        $coords = $results->first()->getCoordinates();
        return ['lat' => $coords->getLatitude(), 'lng' => $coords->getLongitude()];
    }
}