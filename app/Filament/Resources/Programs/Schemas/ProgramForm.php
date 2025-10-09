<?php

namespace App\Filament\Resources\Programs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Hidden;

class ProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('team_id')
                    ->default(
                        fn () => auth()->user()->current_team_id ?? null
                    )
                    ->required(),
                Hidden::make('creator_id')
                    ->default(fn () => auth()->id())
                    ->required(),
                TextInput::make('name')
                    ->label('Nama Program')
                    ->required()
                    ->maxLength(255)
                    ->autoFocus()
                    ->columnSpanFull(),
                DatePicker::make('program_start')
                    ->label('Tarikh Mula')
                    ->required(),
                DatePicker::make('program_end')
                    ->label('Tarikh Tamat'),
                TextInput::make('location')
                    ->label('Lokasi')
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Butiran')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }
}
