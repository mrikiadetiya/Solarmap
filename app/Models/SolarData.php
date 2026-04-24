<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolarData extends Model
{
    protected $fillable = [
        'region_id',
        'ghi',
        'dni',
        'month',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
