<?php

namespace App\Filament\Resources\Rooms\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('room_type_id')
                        ->relationship('roomType','name')->searchable()->required(),
                TextInput::make('number')->required(),
                Select::make('status')
                        ->options(['available'=>'Available','maintenance'=>'Maintenance'])
                        ->default('available')->required(),
                ])->columns(2);
    }
}
