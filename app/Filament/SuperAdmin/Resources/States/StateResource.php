<?php

namespace App\Filament\SuperAdmin\Resources\States;

use App\Filament\SuperAdmin\Resources\States\Pages\CreateState;
use App\Filament\SuperAdmin\Resources\States\Pages\EditState;
use App\Filament\SuperAdmin\Resources\States\Pages\ListStates;
use App\Filament\SuperAdmin\Resources\States\Pages\ViewState;
use App\Filament\SuperAdmin\Resources\States\Schemas\StateForm;
use App\Filament\SuperAdmin\Resources\States\Schemas\StateInfolist;
use App\Filament\SuperAdmin\Resources\States\Tables\StatesTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use App\Models\State;

class StateResource extends Resource
{
    protected static ?string $model = State::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return StateForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return StateInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return StatesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListStates::route('/'),
            'create' => CreateState::route('/create'),
            'view' => ViewState::route('/{record}'),
            'edit' => EditState::route('/{record}/edit'),
        ];
    }
}
