<?php

namespace App\Services;

class RecommendationService
{
    public function getRecommendation(array $data)
    {
        // For now, return a static recommendation.
        // Later, we will implement logic to determine the best system type.
        return [
            'system_type' => 'on-grid',
            'notes' => 'This is a basic recommendation. For a more detailed analysis, please contact us.',
        ];
    }
}
