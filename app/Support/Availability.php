<?php

use App\Models\{Rate, Room, Booking, RoomType};
use Carbon\Carbon;
use Carbon\CarbonPeriod;

if (! function_exists('checkAvailability')) {
    function checkAvailability(int $roomTypeId, string|Carbon $checkIn, string|Carbon $checkOut, int $qty = 1): bool
    {
        $in  = $checkIn instanceof Carbon ? $checkIn : Carbon::parse($checkIn);
        $out = $checkOut instanceof Carbon ? $checkOut : Carbon::parse($checkOut);

        // Daftar tanggal di antara check-in dan check-out (tidak termasuk hari keluar)
        $period = CarbonPeriod::create($in, $out->copy()->subDay());

        // Total kamar di tipe tersebut
        $totalRooms = Room::where('room_type_id', $roomTypeId)->count();
        if ($totalRooms <= 0) {
            return false;
        }

        foreach ($period as $date) {
            // Ambil allotment rate jika ada, fallback ke jumlah kamar
            $rate = Rate::where('room_type_id', $roomTypeId)
                        ->whereDate('date', $date)
                        ->first();

            $allotment = $rate?->allotment ?? $totalRooms;

            // Hitung jumlah kamar yang sudah dibooking pada tanggal tsb
            $booked = Booking::where('room_type_id', $roomTypeId)
                        ->whereIn('status', ['pending', 'confirmed', 'checked_in'])
                        ->whereDate('check_in', '<=', $date)
                        ->whereDate('check_out', '>', $date)
                        ->sum('qty');

            // Jika sisa allotment < qty yang diminta, tidak tersedia
            if (($allotment - $booked) < $qty) {
                return false;
            }
        }

        return true;
    }
}
