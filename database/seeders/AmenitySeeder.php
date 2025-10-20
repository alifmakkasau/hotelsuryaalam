<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Amenity;

class AmenitySeeder extends Seeder
{
    public function run(): void
    {
        $names = ['WiFi', 'AC', 'TV', 'Breakfast', 'Water Heater', 'Parking', 'Pool Access'];
        foreach ($names as $n) {
            Amenity::firstOrCreate(['name' => $n]);
        }
    }
}
