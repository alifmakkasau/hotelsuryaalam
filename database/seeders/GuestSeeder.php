<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guest;
use Faker\Factory as Faker;

class GuestSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        foreach (range(1, 40) as $i) {
            Guest::firstOrCreate(
                ['email' => $faker->unique()->safeEmail()],
                ['name' => $faker->name(), 'phone' => $faker->phoneNumber()]
            );
        }
    }
}
