<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use App\Models\{RoomType,Rate};
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Validation\ValidationException;
class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        $recalc = function (Set $set, Get $get) {
            $in = $get('check_in'); $out = $get('check_out');
            $rt = $get('room_type_id'); $qty = max(1, (int) $get('qty'));
            if (!$in || !$out || !$rt) return;

            $nights = max(1, \Carbon\Carbon::parse($in)->diffInDays(\Carbon\Carbon::parse($out)));
            $period = \Carbon\CarbonPeriod::create($in, \Carbon\Carbon::parse($out)->subDay());
            $prices = [];
            foreach ($period as $d) {
                $rate = Rate::where('room_type_id',$rt)->whereDate('date',$d)->first();
                $prices[] = $rate?->price ?? RoomType::find($rt)?->base_price ?? 0;
            }
            if (!count($prices)) return;
            $avg = round(array_sum($prices)/count($prices), 2);
            $set('price_per_night', $avg);
            $set('total', $avg * $nights * $qty);
        };

        return $schema
            ->components([
               Select::make('room_type_id')
                ->relationship('roomType','name')->required()->reactive()
                ->afterStateUpdated($recalc),
           Select::make('guest_id')
                ->relationship('guest','name')
                ->createOptionForm([
                    TextInput::make('name')->required(),
                    TextInput::make('email')->email(),
                    TextInput::make('phone'),
                ])->required(),
            DatePicker::make('check_in')->required()->reactive()->afterStateUpdated($recalc),
            DatePicker::make('check_out')->required()->after('check_in')->reactive()->afterStateUpdated($recalc),
            TextInput::make('qty')->numeric()->minValue(1)->default(1)->reactive()->afterStateUpdated($recalc),

           TextInput::make('price_per_night')->readOnly(),
            TextInput::make('total')->readOnly(),

            Select::make('status')
                ->options([
                    'pending'=>'Pending','confirmed'=>'Confirmed',
                    'checked_in'=>'Check-In','checked_out'=>'Check-Out','cancelled'=>'Cancelled',
                ])->default('pending')->required(),
        ])->columns(2);
        // ->mutateFormDataUsing(function (array $data) {
        //     // validasi ketersediaan (helper checkAvailability harus ada)
        //     $ok = checkAvailability((int)$data['room_type_id'], $data['check_in'], $data['check_out'], (int)$data['qty']);
        //     if (!$ok) {
        //         throw ValidationException::withMessages([
        //             'qty' => 'Ketersediaan kamar tidak mencukupi pada rentang tanggal tersebut.',
        //         ]);
        //     }
        //     return $data;
        // });
    }
}
