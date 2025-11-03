<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{RoomType, Room};

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID setiap tipe kamar
        $ekonomiId   = RoomType::where('name', 'Ekonomi')->value('id');
        $standarId   = RoomType::where('name', 'Standart')->value('id');
        $twinId      = RoomType::where('name', 'Standart Twin Room')->value('id');
        $superiorId  = RoomType::where('name', 'Superior')->value('id');

        // ========================
        // Ekonomi
        // ========================
        foreach (['21'] as $n) {
            Room::firstOrCreate(
                ['number' => (string) $n],
                [
                    'room_type_id' => $ekonomiId,
                    'status' => 'available',
                ]
            );
        }

        // ========================
        // Standart
        // ========================
        $standartRooms = ['11','12','22','23','25','26','27','28','33','34','35'];
        foreach ($standartRooms as $n) {
            Room::firstOrCreate(
                ['number' => (string) $n],
                [
                    'room_type_id' => $standarId,
                    'status' => 'available',
                ]
            );
        }

        // ========================
        // Standart Twin Room
        // ========================
        $twinRooms = ['31','32'];
        foreach ($twinRooms as $n) {
            Room::firstOrCreate(
                ['number' => (string) $n],
                [
                    'room_type_id' => $twinId,
                    'status' => 'available',
                ]
            );
        }

        // ========================
        // Superior
        // ========================
        $superiorRooms = ['14','15','24','29','210','211','36','37'];
        foreach ($superiorRooms as $n) {
            Room::firstOrCreate(
                ['number' => (string) $n],
                [
                    'room_type_id' => $superiorId,
                    'status' => 'available',
                ]
            );
        }
    }
}
