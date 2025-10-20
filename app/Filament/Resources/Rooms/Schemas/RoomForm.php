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
                TextInput::make('room_type_id')
                    ->required()
                    ->numeric(),
                TextInput::make('number')
                    ->required(),
                Select::make('status')
                    ->options(['available' => 'Available', 'maintenance' => 'Maintenance'])
                    ->default('available')
                    ->required(),
            ]);
    }
}
