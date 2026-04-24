<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create(['name' => 'Jakarta', 'latitude' => -6.2088, 'longitude' => 106.8456]);
        Region::create(['name' => 'Surabaya', 'latitude' => -7.2575, 'longitude' => 112.7521]);
        Region::create(['name' => 'Bandung', 'latitude' => -6.9175, 'longitude' => 107.6191]);
    }
}
