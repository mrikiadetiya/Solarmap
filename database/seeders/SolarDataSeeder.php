<?php

namespace Database\Seeders;

use App\Models\SolarData;
use Illuminate\Database\Seeder;

class SolarDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SolarData::create(['region_id' => 1, 'ghi' => 5.5, 'dni' => 6.2, 'month' => 1]);
        SolarData::create(['region_id' => 1, 'ghi' => 5.8, 'dni' => 6.5, 'month' => 2]);
        SolarData::create(['region_id' => 2, 'ghi' => 6.1, 'dni' => 6.8, 'month' => 1]);
        SolarData::create(['region_id' => 2, 'ghi' => 6.3, 'dni' => 7.0, 'month' => 2]);
        SolarData::create(['region_id' => 3, 'ghi' => 5.2, 'dni' => 5.9, 'month' => 1]);
        SolarData::create(['region_id' => 3, 'ghi' => 5.4, 'dni' => 6.1, 'month' => 2]);
    }
}
