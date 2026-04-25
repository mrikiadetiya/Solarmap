<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SolarService
{
    /**
     * Get solar radiation data from NASA POWER API.
     *
     * @param float $lat
     * @param float $lon
     * @return array|null
     */
    public function getSolarAnalysis($lat, $lon)
    {
        try {
            $url = "https://power.larc.nasa.gov/api/temporal/climatology/point";
            
            $response = Http::get($url, [
                'parameters' => 'ALLSKY_SFC_SW_DWN',
                'community' => 'RE',
                'longitude' => $lon,
                'latitude' => $lat,
                'format' => 'JSON',
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $this->formatNasaData($data);
            }

            Log::error("NASA API Error: " . $response->status() . " - " . $response->body());
            return null;
        } catch (\Exception $e) {
            Log::error("NASA API Exception: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Format NASA API response for the application.
     *
     * @param array $data
     * @return array
     */
    private function formatNasaData($data)
    {
        $monthlyData = $data['properties']['parameter']['ALLSKY_SFC_SW_DWN'] ?? [];
        
        // NASA returns Jan-Dec + Annual. We want just Jan-Dec.
        $months = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        $formatted = [];
        $total = 0;
        
        foreach ($months as $month) {
            $val = $monthlyData[$month] ?? 0;
            $formatted[$month] = $val;
            $total += $val;
        }
        
        $average = $total / 12;
        
        return [
            'monthly' => $formatted,
            'average' => round($average, 2),
            'annual' => $monthlyData['ANN'] ?? round($average, 2),
            'source' => 'NASA POWER API',
        ];
    }
}
