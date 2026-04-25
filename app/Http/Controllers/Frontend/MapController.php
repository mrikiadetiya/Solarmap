<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Region;

class MapController extends Controller
{
    public function index()
    {
        $regions = Region::with(['solarData'])->get()->map(function($region) {
            $region->avg_ghi = $region->solarData->avg('ghi') ?? 0;
            return $region;
        });

        return view('frontend.map', compact('regions'));
    }
}
