<?php

namespace App\Filament\SuperAdmin\Resources\Programs;

use App\Filament\SuperAdmin\Resources\Programs\Pages\CreateProgram;
use App\Filament\SuperAdmin\Resources\Programs\Pages\EditProgram;
use App\Filament\SuperAdmin\Resources\Programs\Pages\ListPrograms;
use App\Filament\SuperAdmin\Resources\Programs\Pages\ViewProgram;
use App\Filament\SuperAdmin\Resources\Programs\Schemas\ProgramForm;
use App\Filament\SuperAdmin\Resources\Programs\Schemas\ProgramInfolist;
use App\Filament\SuperAdmin\Resources\Programs\Tables\ProgramsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Program;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ProgramForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProgramInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProgramsTable::configure($table);
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
            'index' => ListPrograms::route('/'),
            'create' => CreateProgram::route('/create'),
            //'view' => ViewProgram::route('/{record}'),
            //'edit' => EditProgram::route('/{record}/edit'),
        ];
    }
}
