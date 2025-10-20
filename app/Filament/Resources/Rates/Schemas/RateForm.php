<?php

namespace App\Filament\Resources\Rates\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class RateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('room_type_id')
                    ->relationship('roomType','name')
                    ->required()
                    ->numeric(),
                DatePicker::make('date')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR'),
                TextInput::make('allotment')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
