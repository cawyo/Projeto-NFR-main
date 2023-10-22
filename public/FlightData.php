<?php

namespace flights;

class Aircraft{
    private $callsign;
    private $altitude;
    private $latitude;
    private $longitude;

    public function __construct($callsign,$altitude, $latitude,$longitude)
    {
        $this->callsign = $callsign;
        $this->altitude = $altitude;
        $this->latitude = $latitude;
        $this->longitude = $longitude;

    }
}


$openSkyData = json_decode(file_get_contents('https://opensky-network.org/api/states/all'));


foreach ($openSkyData->states as $state) {
  $aircraft = new Aircraft($state[1], $state[7], $state[6], $state[5]);
}