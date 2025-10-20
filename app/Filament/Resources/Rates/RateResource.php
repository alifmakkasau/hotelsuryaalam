<?php

namespace App\Filament\Resources\Rates;

use App\Filament\Resources\Rates\Pages\CreateRate;
use App\Filament\Resources\Rates\Pages\EditRate;
use App\Filament\Resources\Rates\Pages\ListRates;
use App\Filament\Resources\Rates\Schemas\RateForm;
use App\Filament\Resources\Rates\Tables\RatesTable;
use App\Models\Rate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class RateResource extends Resource
{
    protected static ?string $model = Rate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCurrencyDollar;

    protected static string|UnitEnum|null $navigationGroup = 'Penjualan';
    protected static ?int $navigationSort = 20;
    protected static ?string $label = 'Tarif Harian';
    protected static ?string $pluralLabel = 'Tarif Harian';

    public static function form(Schema $schema): Schema
    {
        return RateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RatesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListRates::route('/'),
            'create' => CreateRate::route('/create'),
            'edit' => EditRate::route('/{record}/edit'),
        ];
    }
}
