<?php

namespace App\Filament\Resources\Transactions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label('Nama Transaksi')->searchable()->sortable(),
                TextColumn::make('debit_amount')->label('Debit (RM)')->money('MYR', true)->sortable(),
                TextColumn::make('credit_amount')->label('Kredit (RM)')->money('MYR', true)->sortable(),
                TextColumn::make('transaction_date')->label('Tarikh Transaksi')->date()->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
