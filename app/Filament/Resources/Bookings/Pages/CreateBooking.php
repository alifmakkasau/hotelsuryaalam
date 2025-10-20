<?php

namespace App\Filament\Resources\Bookings\Pages;

use App\Filament\Resources\Bookings\BookingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBooking extends CreateRecord
{
    protected static string $resource = BookingResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $roomTypeId = (int) $data['room_type_id'];
        $in  = $data['check_in'];
        $out = $data['check_out'];
        $qty = max(1, (int) $data['qty']);

        // Validasi ketersediaan (helper kamu)
        if (! checkAvailability($roomTypeId, $in, $out, $qty)) {
            throw ValidationException::withMessages([
                'qty' => 'Ketersediaan kamar tidak mencukupi pada rentang tanggal tersebut.',
            ]);
        }

        // Hitung ulang server-side untuk keamanan
        [$avg, $nights] = $this->calculatePrice($roomTypeId, $in, $out);
        $data['price_per_night'] = $avg;
        $data['total'] = $avg * $nights * $qty;

        return $data;
    }

    private function calculatePrice(int $roomTypeId, string $in, string $out): array
    {
        $nights = max(1, Carbon::parse($in)->diffInDays(Carbon::parse($out)));
        $period = CarbonPeriod::create($in, Carbon::parse($out)->subDay());
        $prices = [];

        foreach ($period as $d) {
            $rate = Rate::where('room_type_id', $roomTypeId)->whereDate('date', $d)->first();
            $prices[] = $rate?->price ?? RoomType::find($roomTypeId)?->base_price ?? 0;
        }

        $avg = count($prices) ? round(array_sum($prices) / count($prices), 2) : 0.0;
        return [$avg, $nights];
    }
}
