<?php

namespace App\Filament\Resources\Agendas\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Hidden;

class AgendaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Tajuk')
                    ->required()
                    ->maxLength(255),
                Select::make('meeting_id')
                    ->label('Mesyuarat')
                    ->relationship('meeting', 'title')
                    ->required(),
                Textarea::make('description')
                    ->label('Penerangan')
                    ->nullable()
                    ->rows(3)
                    ->maxLength(65535),
                TextInput::make('order')
                    ->label('Susunan')
                    ->numeric()
                    ->default(0)
                    ->required(),
                Hidden::make('presented_by')
                    ->default(auth()->id())
                    ->nullable(),
                Textarea::make('decision')
                    ->label('Keputusan')
                    ->nullable()
                    ->rows(3)
                    ->maxLength(65535),
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                    ])
                    ->nullable(),
            ]);
    }
}
