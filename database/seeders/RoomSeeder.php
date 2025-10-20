<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{RoomType, Room};

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $deluxeId   = RoomType::where('name','Deluxe')->value('id');
        $superiorId = RoomType::where('name','Superior')->value('id');
        $familyId   = RoomType::where('name','Family')->value('id');

        foreach (range(101, 110) as $n) {
            Room::firstOrCreate(['number' => (string)$n], ['room_type_id' => $deluxeId, 'status' => 'available']);
        }
        foreach (range(201, 208) as $n) {
            Room::firstOrCreate(['number' => (string)$n], ['room_type_id' => $superiorId, 'status' => 'available']);
        }
        foreach (range(301, 304) as $n) {
            Room::firstOrCreate(['number' => (string)$n], ['room_type_id' => $familyId, 'status' => 'available']);
        }
    }
}
