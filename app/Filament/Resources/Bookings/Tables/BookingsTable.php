<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\CreateAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DatePicker;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Booking;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code')->searchable()->label('Kode'),
                TextColumn::make('roomType.name')->label('Tipe')->sortable()->searchable(),
                TextColumn::make('guest.name')->label('Tamu')->searchable(),
                TextColumn::make('check_in')->date(),
                TextColumn::make('check_out')->date(),
                TextColumn::make('status')->colors([
                    'warning'=>'pending','success'=>'confirmed','info'=>'checked_in','gray'=>'checked_out','danger'=>'cancelled',
                ])->badge()->sortable(),
                TextColumn::make('total')->money('idr')->sortable(),
            ])->filters([
                SelectFilter::make('status')
                    ->options(['pending'=>'Pending','confirmed'=>'Confirmed','checked_in'=>'Check-In','checked_out'=>'Check-Out','cancelled'=>'Cancelled']),
                // Tables\Filters\Filter::make('date_range')
                //     ->form([Forms\Components\DatePicker::make('from'), Forms\Components\DatePicker::make('to')])
                //     ->query(fn($q,$d)=>$q
                //         ->when($d['from']??null, fn($qq,$v)=>$qq->whereDate('check_in','>=',$v))
                //         ->when($d['to']??null, fn($qq,$v)=>$qq->whereDate('check_out','<=',$v))),
            ])->actions([
                ViewAction::make(),
                CreateAction::make('confirm')->visible(fn(Booking $r)=>$r->status==='pending')
                    ->requiresConfirmation()->action(fn(Booking $r)=>$r->update(['status'=>'confirmed'])),
                CreateAction::make('check_in')->visible(fn(Booking $r)=>$r->status==='confirmed')
                    ->requiresConfirmation()->action(fn(Booking $r)=>$r->update(['status'=>'checked_in'])),
                CreateAction::make('check_out')->visible(fn(Booking $r)=>$r->status==='checked_in')
                    ->requiresConfirmation()->action(fn(Booking $r)=>$r->update(['status'=>'checked_out'])),
            ])->defaultSort('check_in','desc')
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
