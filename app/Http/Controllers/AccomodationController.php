<?php

namespace App\Http\Controllers;

use App\Models\{RoomType, Rate};
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AccomodationController extends Controller
{
    public function index()
    {
        // RoomType + images + amenities untuk grid
        $rooms = RoomType::with(['images' => fn($q)=>$q->orderBy('sort')],
                                'amenities')
                    ->orderBy('base_price')->get();

        return view('accommodation.index', compact('rooms'));
    }

      public function show(RoomType $roomType, Request $request)
    {
        // prefill dari query (kalau datang dari "BOOK NOW")
        $check_in  = $request->query('check_in', now()->toDateString());
        $check_out = $request->query('check_out', now()->addDay()->toDateString());
        $qty       = (int) $request->query('qty', 1);
        $adults    = (int) $request->query('adults', 2);
        $children  = (int) $request->query('children', 0);

        // ambil gambar & fasilitas
        $roomType->load(['images' => fn($q)=>$q->orderBy('sort')],
                        'amenities');

        // hitung avg price periode (untuk display ringkas)
        [$avgPrice, $nights] = $this->averagePrice($roomType->id, $check_in, $check_out);

        // cek ketersediaan
        $available = checkAvailability($roomType->id, $check_in, $check_out, $qty);

        return view('accommodation.show', compact(
            'roomType','check_in','check_out','qty','adults','children','avgPrice','nights','available'
        ));
    }

    private function averagePrice(int $roomTypeId, string $in, string $out): array
    {
        $nights = max(1, Carbon::parse($in)->diffInDays(Carbon::parse($out)));
        $period = CarbonPeriod::create($in, Carbon::parse($out)->subDay());
        $prices = [];
        foreach ($period as $d) {
            $rate = Rate::where('room_type_id',$roomTypeId)->whereDate('date',$d)->first();
            $prices[] = $rate?->price ?? \App\Models\RoomType::find($roomTypeId)?->base_price ?? 0;
        }
        $avg = count($prices) ? round(array_sum($prices)/count($prices), 2) : 0.0;
        return [$avg, $nights];
    }
}
