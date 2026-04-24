<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable = [
        'calculation_id',
        'system_type',
        'notes',
    ];

    public function calculation()
    {
        return $this->belongsTo(Calculation::class);
    }
}
