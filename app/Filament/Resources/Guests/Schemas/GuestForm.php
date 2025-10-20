<?php

namespace App\Filament\Resources\Guests\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GuestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->unique(ignoreRecord: true),
                TextInput::make('phone')
                    ->tel()
                    ->default(null),
            ]);
    }
}
