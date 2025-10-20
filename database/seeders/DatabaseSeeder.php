<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use SingleHotelSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AmenitySeeder::class,
            RoomTypeSeeder::class,
            RoomSeeder::class,
            RateSeeder::class,
            GuestSeeder::class,
            BookingSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
