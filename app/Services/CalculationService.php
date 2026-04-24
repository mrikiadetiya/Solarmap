<?php

namespace App\Services;

class CalculationService
{
    public function calculate(array $data)
    {
        $electricityConsumption = $data['electricity_consumption'];

        $numberOfPanels = $this->calculateNumberOfPanels($electricityConsumption);
        $electricityProduction = $this->calculateElectricityProduction($numberOfPanels);
        $costEstimation = $this->calculateCostEstimation($numberOfPanels);

        return [
            'number_of_panels' => $numberOfPanels,
            'electricity_production' => $electricityProduction,
            'cost_estimation' => $costEstimation,
        ];
    }

    private function calculateNumberOfPanels(int $electricityConsumption)
    {
        // Dummy formula: 1 panel for every 100 kWh of monthly consumption
        return ceil($electricityConsumption / 100);
    }

    private function calculateElectricityProduction(int $numberOfPanels)
    {
        // Dummy formula: each panel produces 50 kWh per month
        return $numberOfPanels * 50;
    }

    private function calculateCostEstimation(int $numberOfPanels)
    {
        // Dummy formula: each panel costs $250 to install
        return $numberOfPanels * 250;
    }
}
