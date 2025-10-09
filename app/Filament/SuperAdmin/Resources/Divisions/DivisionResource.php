<?php

namespace App\Filament\SuperAdmin\Resources\Divisions;

use App\Filament\SuperAdmin\Resources\Divisions\Pages\CreateDivision;
use App\Filament\SuperAdmin\Resources\Divisions\Pages\EditDivision;
use App\Filament\SuperAdmin\Resources\Divisions\Pages\ListDivisions;
use App\Filament\SuperAdmin\Resources\Divisions\Pages\ViewDivision;
use App\Filament\SuperAdmin\Resources\Divisions\Schemas\DivisionForm;
use App\Filament\SuperAdmin\Resources\Divisions\Schemas\DivisionInfolist;
use App\Filament\SuperAdmin\Resources\Divisions\Tables\DivisionsTable;
use BackedEnum;
use App\Models\Division;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DivisionResource extends Resource
{
    protected static ?string $model = Division::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return DivisionForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return DivisionInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DivisionsTable::configure($table);
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
            'index' => ListDivisions::route('/'),
            //'create' => CreateDivision::route('/create'),
            'view' => ViewDivision::route('/{record}'),
            //'edit' => EditDivision::route('/{record}/edit'),
        ];
    }
}
