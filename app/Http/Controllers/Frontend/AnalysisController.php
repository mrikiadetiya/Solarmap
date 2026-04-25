<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SolarService;
use App\Models\Region;

class AnalysisController extends Controller
{
    protected $solarService;

    public function __construct(SolarService $solarService)
    {
        $this->solarService = $solarService;
    }

    public function index(Request $request)
    {
        $lat = $request->input('lat', -9.6234); // Default to Desa Wairasa if not provided
        $lon = $request->input('lon', 119.8765);
        $locationName = $request->input('location', 'Desa Wairasa, NTT');

        // Check if we're coming from the map with a region ID
        if ($request->has('region')) {
            $region = Region::find($request->region);
            if ($region) {
                $lat = $region->latitude;
                $lon = $region->longitude;
                $locationName = $region->name;
            }
        }

        $solarData = $this->solarService->getSolarAnalysis($lat, $lon);
        $regions = Region::all();

        return view('frontend.analysis', [
            'lat' => $lat,
            'lon' => $lon,
            'locationName' => $locationName,
            'solarData' => $solarData,
            'isMock' => $solarData === null,
            'regions' => $regions
        ]);
    }
}
