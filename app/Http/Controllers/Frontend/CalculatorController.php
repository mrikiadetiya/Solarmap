<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\CalculationService;

use App\Models\Region;

class CalculatorController extends Controller
{
    public function index()
    {
        $regions = Region::with(['solarData'])->get()->map(function($region) {
            $region->avg_ghi = $region->solarData->avg('ghi') ?? 4.8;
            return $region;
        });

        return view('frontend.calculator', compact('regions'));
    }

    public function calculate(Request $request, CalculationService $calculationService)
    {
        $data = $request->validate([
            'electricity_consumption' => 'required|numeric|min:1',
        ]);

        $results = $calculationService->calculate($data);

        return view('frontend.calculator', ['results' => $results]);
    }
}
