<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\CalculationService;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('frontend.calculator');
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
