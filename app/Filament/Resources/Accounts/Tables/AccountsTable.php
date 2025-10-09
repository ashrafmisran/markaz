<?php

namespace App\Filament\Resources\Accounts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;


class AccountsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('code_no')->label('Kod Akaun')->searchable()->toggleable(),
                TextColumn::make('name')->label('Nama Akaun')->searchable(),
                TextColumn::make('initial_balance')->label('Baki (RM)')->numeric()->alignEnd(),
            ])
            ->defaultGroup('category')
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
