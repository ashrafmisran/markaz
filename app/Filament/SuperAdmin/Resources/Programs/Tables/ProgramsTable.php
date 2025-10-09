<?php

namespace App\Filament\SuperAdmin\Resources\Programs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ProgramsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('team.name')->label('Nama Penganjur')->searchable()->sortable(),
                TextColumn::make('name')->label('Nama Program')->searchable()->sortable(),
                TextColumn::make('program_start')->label('Tarikh Mula')->date()->sortable(),
                TextColumn::make('program_end')->label('Tarikh Tamat')->date()->sortable(),
                TextColumn::make('location')->label('Lokasi')->searchable()->sortable(),
            ])
            ->filters([
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make()
                    ->url(fn ($record) => route('filament.superadmin.resources.programs.edit', ['record' => $record->getRouteKey()])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
