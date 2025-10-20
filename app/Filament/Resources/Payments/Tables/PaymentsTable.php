<?php

namespace App\Filament\Resources\Payments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DatePicker;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('booking.code')->label('Kode Booking')->searchable()->sortable(),
                TextColumn::make('method')->badge()->sortable(),
                TextColumn::make('amount')->money('idr')->sortable(),
                TextColumn::make('status')->colors(['success'=>'paid','warning'=>'pending','danger'=>'failed'])->badge()->sortable(),
                TextColumn::make('ref')->label('Ref'),
                TextColumn::make('created_at')->dateTime()->since(),
            ])->filters([
                SelectFilter::make('status')->options(['pending'=>'Pending','paid'=>'Paid','failed'=>'Failed']),
                // Filter::make('date')->form([
                //     TextColumn::make('from')->date(),
                //     TextColumn::make('to')->date(),
                // ])->query(fn($q,$d)=>$q
                //     ->when($d['from']??null, fn($qq,$v)=>$qq->whereDate('created_at','>=',$v))
                //     ->when($d['to']??null, fn($qq,$v)=>$qq->whereDate('created_at','<=',$v))),
            ])->defaultSort('created_at','desc')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
