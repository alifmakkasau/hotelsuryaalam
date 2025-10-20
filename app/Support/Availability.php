<?php

use App\Models\{Rate, Room, Booking, RoomType};
use Carbon\Carbon;
use Carbon\CarbonPeriod;

if (! function_exists('checkAvailability')) {
    function checkAvailability(int $roomTypeId, string $in, string $out, int $qty): bool {
        $period = CarbonPeriod::create($in, Carbon::parse($out)->subDay());
        foreach ($period as $d) {
            // kapasitas dasar = jumlah kamar pada tipe ini
            $totalRooms = Room::where('room_type_id',$roomTypeId)->count();

            // allotment khusus tanggal (boleh override)
            $rate = Rate::where('room_type_id',$roomTypeId)->whereDate('date',$d)->first();
            $allotment = $rate?->allotment ?? $totalRooms;

            // pemakaian (booking confirmed yang overlap tanggal d)
            $used = Booking::where('room_type_id',$roomTypeId)
                ->whereIn('status', ['confirmed','checked_in'])
                ->whereDate('check_in','<=',$d)
                ->whereDate('check_out','>', $d) // malam itu terhitung okupansi
                ->sum('qty');

            if (($allotment - $used) < $qty) return false;
        }
        return true;
    }
}
