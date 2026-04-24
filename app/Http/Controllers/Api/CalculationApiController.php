<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CalculationService;
use Illuminate\Http\Request;

class CalculationApiController extends Controller
{
    public function calculate(Request $request, CalculationService $calculationService)
    {
        $data = $request->validate([
            'electricity_consumption' => 'required|numeric|min:1',
        ]);

        $results = $calculationService->calculate($data);

        return response()->json($results);
    }
}
