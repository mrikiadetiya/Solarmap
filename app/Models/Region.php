<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name',
        'latitude',
        'longitude',
    ];

    public function solarData()
    {
        return $this->hasMany(SolarData::class);
    }
}
