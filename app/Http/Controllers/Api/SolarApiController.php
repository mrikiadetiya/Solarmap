<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SolarApiController extends Controller
{
    public function getSolarData(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Dummy data for now.
        // Later, we can fetch this from the NASA POWER API.
        $solarData = [
            'dni' => 5.5, // Direct Normal Irradiance
            'ghi' => 6.2, // Global Horizontal Irradiance
        ];

        return response()->json($solarData);
    }
}
