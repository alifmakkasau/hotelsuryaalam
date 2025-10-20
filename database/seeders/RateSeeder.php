<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{RoomType, Room, Rate};
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class RateSeeder extends Seeder
{
    public function run(): void
    {
        $days = 90; // ubah sesuai kebutuhan
        $period = CarbonPeriod::create(Carbon::today(), Carbon::today()->addDays($days - 1));

        $roomTypes = RoomType::all();
        foreach ($roomTypes as $rt) {
            $count = Room::where('room_type_id', $rt->id)->count();
            foreach ($period as $d) {
                // contoh: weekend markup +10%
                $isWeekend = in_array($d->dayOfWeekIso, [6,7]);
                $price = $rt->base_price * ($isWeekend ? 1.10 : 1.00);

                Rate::updateOrCreate(
                    ['room_type_id' => $rt->id, 'date' => $d->toDateString()],
                    ['price' => round($price, 2), 'allotment' => $count]
                );
            }
        }
    }
}
