<?php

namespace App\Filament\Resources\Meetings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;

class MeetingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Tajuk')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                DatePicker::make('date')
                    ->label('Tarikh')
                    ->required(),
                TimePicker::make('time')
                    ->label('Masa')
                    ->required(),
                Select::make('team_id')
                    ->label('Pasukan')
                    ->relationship('team', 'name')
                    ->required(),
                TextInput::make('location')
                    ->label('Lokasi')
                    ->maxLength(255),
                RichEditor::make('minutes')
                    ->label('Minit')
                    ->nullable()
                    ->columnSpanFull(),
            ]);
    }
}
