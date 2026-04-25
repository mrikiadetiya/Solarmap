<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PanelPrice;
use App\Services\SolarService;
use Illuminate\Support\Facades\Session;

class CostController extends Controller
{
    public function index()
    {
        $panelPrices = PanelPrice::all();
        
        // Try to get solar data from previous analysis if available
        // Or we can use a default for Indonesia
        $solarData = [
            'average' => 4.8, // Default GHI for Indonesia
            'monthly' => [4.5, 4.6, 4.8, 5.0, 5.2, 5.1, 5.3, 5.4, 5.2, 4.9, 4.7, 4.4]
        ];

        return view('frontend.cost', compact('panelPrices', 'solarData'));
    }
}
