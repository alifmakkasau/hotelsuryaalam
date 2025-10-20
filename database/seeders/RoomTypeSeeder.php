<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{RoomType, Amenity};

class RoomTypeSeeder extends Seeder
{
    public function run(): void
    {
        $deluxe = RoomType::firstOrCreate(
            ['name' => 'Deluxe'],
            ['capacity' => 2, 'base_price' => 450000, 'description' => 'Kamar luas dengan city view']
        );
        $superior = RoomType::firstOrCreate(
            ['name' => 'Superior'],
            ['capacity' => 2, 'base_price' => 350000, 'description' => 'Nyaman & hemat']
        );
        $family = RoomType::firstOrCreate(
            ['name' => 'Family'],
            ['capacity' => 4, 'base_price' => 650000, 'description' => 'Cocok untuk keluarga']
        );

        // pasang amenities dasar
        $amen = Amenity::pluck('id', 'name');
        $deluxe->amenities()->sync([$amen['WiFi'] ?? null, $amen['AC'] ?? null, $amen['TV'] ?? null, $amen['Breakfast'] ?? null]);
        $superior->amenities()->sync([$amen['WiFi'] ?? null, $amen['AC'] ?? null, $amen['TV'] ?? null]);
        $family->amenities()->sync([$amen['WiFi'] ?? null, $amen['AC'] ?? null, $amen['TV'] ?? null, $amen['Water Heater'] ?? null, $amen['Parking'] ?? null]);
    }
}
