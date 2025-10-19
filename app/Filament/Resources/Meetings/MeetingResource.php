<?php

namespace App\Filament\Resources\Meetings;

use App\Filament\Resources\Meetings\Pages\CreateMeeting;
use App\Filament\Resources\Meetings\Pages\EditMeeting;
use App\Filament\Resources\Meetings\Pages\ListMeetings;
use App\Filament\Resources\Meetings\Pages\ViewMeeting;
use App\Filament\Resources\Meetings\Schemas\MeetingForm;
use App\Filament\Resources\Meetings\Schemas\MeetingInfolist;
use App\Filament\Resources\Meetings\Tables\MeetingsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\Meeting;
use App\Filament\Resources\Meetings\RelationManagers\AgendasRelationManager;

class MeetingResource extends Resource
{
    protected static ?string $model = Meeting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function getNavigationGroup(): ?string
    {
        return 'Organisasi';
    }

    public static function getNavigationLabel(): string
    {
        return 'Mesyuarat';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-user-group';
    }

    public static function form(Schema $schema): Schema
    {
        return MeetingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MeetingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MeetingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            AgendasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMeetings::route('/'),
            'create' => CreateMeeting::route('/create'),
            'view' => ViewMeeting::route('/{record}'),
            'edit' => EditMeeting::route('/{record}/edit'),
        ];
    }
}
