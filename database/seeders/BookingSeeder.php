<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Booking, Guest, RoomType, Rate};
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        // konfigurasi
        $bookingsToCreate = 60;
        $start = Carbon::today()->subDays(10); // sebagian backdated
        $end   = Carbon::today()->addDays(60);

        $guests = Guest::inRandomOrder()->get();
        $roomTypes = RoomType::all();

        if ($guests->isEmpty() || $roomTypes->isEmpty()) {
            $this->command->warn('Guests / RoomTypes empty; run previous seeders first.');
            return;
        }

        $i = 0;
        while ($i < $bookingsToCreate) {
            /** @var \App\Models\RoomType $rt */
            $rt = $roomTypes->random();
            $checkIn  = Carbon::instance($start->copy()->addDays(rand(0, $start->diffInDays($end))));
            $nights   = rand(1, 4);
            $checkOut = $checkIn->copy()->addDays($nights);
            $qty      = rand(1, min(2,  max(1, (int)($rt->capacity >= 3 ? 2 : 1)))); // 1–2 kamar

            // hitung rata-rata price_per_night dari rates
            $dates = collect(range(0, $nights-1))->map(fn($d)=>$checkIn->copy()->addDays($d)->toDateString());
            /** @var Collection $rates */
            $rates = Rate::where('room_type_id', $rt->id)->whereIn('date', $dates)->pluck('price');
            if ($rates->count() !== $nights) {
                // jika belum ada rate untuk semua hari, skip
                continue;
            }
            $avg = round($rates->avg(), 2);

            // hitung penggunaan kamar pada tanggal-tanggal tsb
            if (!$this->enoughAllotment($rt->id, $dates, $qty)) {
                continue;
            }

            $statusPool = ['pending','confirmed','checked_in','checked_out','cancelled'];
            $status = $statusPool[array_rand($statusPool)];

            $guest = $guests->random();

            $booking = Booking::create([
                'room_type_id'    => $rt->id,
                'guest_id'        => $guest->id,
                'check_in'        => $checkIn->toDateString(),
                'check_out'       => $checkOut->toDateString(),
                'qty'             => $qty,
                'price_per_night' => $avg,
                'total'           => $avg * $nights * $qty,
                'status'          => $status,
                'code'            => Str::upper(Str::random(8)),
            ]);

            $i++;
        }
    }

    /**
     * Pastikan allotment cukup untuk seluruh tanggal booking.
     */
    protected function enoughAllotment(int $roomTypeId, \Illuminate\Support\Collection $dates, int $qty): bool
    {
        foreach ($dates as $d) {
            $rate = \App\Models\Rate::where('room_type_id', $roomTypeId)->where('date', $d)->first();
            if (!$rate) return false;

            $used = \App\Models\Booking::where('room_type_id', $roomTypeId)
                ->whereIn('status', ['confirmed','checked_in'])
                ->whereDate('check_in','<=',$d)
                ->whereDate('check_out','>', $d)
                ->sum('qty');

            if (($rate->allotment - $used) < $qty) return false;
        }
        return true;
    }
}
