<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NasaPowerService
{
    public function getSolarData($lat, $lon)
    {
        $url = "https://power.larc.nasa.gov/api/temporal/daily/point";

        $response = Http::get($url, [
            'parameters' => 'ALLSKY_SFC_SW_DWN',
            'community' => 'RE',
            'longitude' => $lon,
            'latitude' => $lat,
            'start' => 20240101,
            'end' => 20240110,
            'format' => 'JSON'
        ]);

        return $response->json();
    }

    public function getAverageIrradiance($lat, $lon)
    {
        $data = $this->getSolarData($lat, $lon);

        $values = $data['properties']['parameter']['ALLSKY_SFC_SW_DWN'] ?? [];

        if (empty($values)) return 0;

        return array_sum($values) / count($values);
    }
}