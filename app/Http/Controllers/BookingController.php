<?php

namespace App\Http\Controllers;

use App\Models\{Booking, Guest, Rate, RoomType};
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'room_type_id' => ['required','exists:room_types,id'],
            'check_in'     => ['required','date','after_or_equal:today'],
            'check_out'    => ['required','date','after:check_in'],
            'qty'          => ['required','integer','min:1','max:10'],
            'adults'       => ['nullable','integer','min:1','max:10'],
            'children'     => ['nullable','integer','min:0','max:10'],
            'name'         => ['required','string','max:100'],
            'email'        => ['nullable','email','max:150'],
            'phone'        => ['nullable','string','max:50'],
        ]);

        $rtId = (int) $data['room_type_id'];
        if (! checkAvailability($rtId, $data['check_in'], $data['check_out'], (int)$data['qty'])) {
            throw ValidationException::withMessages(['qty' => 'Maaf, kamar tidak mencukupi pada tanggal tersebut.']);
        }

        // guest upsert sederhana
        $guest = $data['email']
            ? Guest::firstOrCreate(['email'=>$data['email']], ['name'=>$data['name'],'phone'=>$data['phone']])
            : Guest::firstOrCreate(['name'=>$data['name'],'phone'=>$data['phone']], ['email'=>null]);

        [$avg, $nights] = $this->averagePrice($rtId, $data['check_in'], $data['check_out']);

        $booking = Booking::create([
            'room_type_id'    => $rtId,
            'guest_id'        => $guest->id,
            'check_in'        => $data['check_in'],
            'check_out'       => $data['check_out'],
            'qty'             => (int)$data['qty'],
            'price_per_night' => $avg,
            'total'           => $avg * $nights * (int)$data['qty'],
            'status'          => 'pending',
            'code'            => Str::upper(Str::random(8)),
        ]);

        return redirect()->route('booking.show', $booking->code)->with('success','Booking berhasil dibuat.');
    }

    public function show($code){
        $booking = Booking::with(['guest','roomType','payments'])->where('code',$code)->firstOrFail();
        return view('booking.show', compact('booking'));
    }

    private function averagePrice(int $roomTypeId, string $in, string $out): array
    {
        $nights = max(1, Carbon::parse($in)->diffInDays(Carbon::parse($out)));
        $period = CarbonPeriod::create($in, Carbon::parse($out)->subDay());
        $prices = [];
        foreach ($period as $d) {
            $rate = Rate::where('room_type_id',$roomTypeId)->whereDate('date',$d)->first();
            $prices[] = $rate?->price ?? RoomType::find($roomTypeId)?->base_price ?? 0;
        }
        $avg = count($prices) ? round(array_sum($prices)/count($prices), 2) : 0.0;
        return [$avg, $nights];
    }
}
