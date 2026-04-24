<?php

namespace App\Services;

class CostService
{
    protected $calculationService;

    public function __construct(CalculationService $calculationService)
    {
        $this->calculationService = $calculationService;
    }

    public function getCostEstimation(array $data)
    {
        $calculationResult = $this->calculationService->calculate($data);

        // For now, just return the cost estimation from the calculation service.
        // Later, we can add more detailed cost breakdown here.
        return [
            'total_cost' => $calculationResult['cost_estimation'],
            'breakdown' => [
                'panels' => $calculationResult['cost_estimation'],
                'inverter' => 0,
                'installation' => 0,
            ],
        ];
    }
}
