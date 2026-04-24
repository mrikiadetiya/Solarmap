<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CostEstimation extends Model
{
    protected $fillable = [
        'calculation_id',
        'total_cost',
        'panel_cost',
        'inverter_cost',
        'installation_cost',
    ];

    public function calculation()
    {
        return $this->belongsTo(Calculation::class);
    }
}
