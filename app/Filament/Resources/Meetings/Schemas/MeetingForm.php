<?php

namespace App\Filament\Resources\Meetings\Schemas;

use Filament\Schemas\Schema;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MarkdownEditor;

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
                Hidden::make('team_id')
                    ->label('Organisasi')
                    ->default(fn () => Filament::getTenant()->id),
                TextInput::make('location')
                    ->label('Lokasi')
                    ->maxLength(255),
                MarkdownEditor::make('minutes')
                    ->label('Minit')
                    ->nullable()
                    ->fileAttachmentsDisk('local')
                    ->fileAttachmentsDirectory('attachments')
                    ->columnSpanFull(),
            ]);
    }
}
