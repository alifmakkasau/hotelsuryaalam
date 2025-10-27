<?php

namespace App\Filament\Resources\RoomTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Schema;

class RoomTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('capacity')->numeric()->minValue(1)->default(2),
                Textarea::make('description'),
                TextInput::make('base_price')->numeric()->prefix('IDR')->required(),
                Select::make('amenities')->multiple()
                    ->relationship('amenities','name')->preload(),
                Repeater::make('images')
                    ->relationship() // <-- ini yang benar (untuk morphMany/hasMany)
                    ->schema([
                        FileUpload::make('path')
                            ->disk('public')
                            ->directory('room-types')   // folder
                            ->image()                   // validasi gambar
                            ->required(),
                       TextInput::make('sort')
                            ->numeric()->default(0)->label('Urutan'),
                    ])
                    ->orderable('sort')
                    ->columnSpanFull(),
            ])->columns(2);
    }
}
