<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PanelPrice;

class PanelPriceSeeder extends Seeder
{
    public function run()
    {
        PanelPrice::create(['name' => 'Jinko Solar 450Wp', 'price_per_watt' => 6500]);
        PanelPrice::create(['name' => 'Longi 540Wp', 'price_per_watt' => 6200]);
        PanelPrice::create(['name' => 'Canadian Solar 400Wp', 'price_per_watt' => 6800]);
    }
}
