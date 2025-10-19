<?php

namespace App\Filament\Resources\PeopleReports;

use App\Filament\Resources\PeopleReports\Pages\CreatePeopleReport;
use App\Filament\Resources\PeopleReports\Pages\EditPeopleReport;
use App\Filament\Resources\PeopleReports\Pages\ListPeopleReports;
use App\Filament\Resources\PeopleReports\Pages\ViewPeopleReport;
use App\Filament\Resources\PeopleReports\Schemas\PeopleReportForm;
use App\Filament\Resources\PeopleReports\Schemas\PeopleReportInfolist;
use App\Filament\Resources\PeopleReports\Tables\PeopleReportsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use PeopleReport;

class PeopleReportResource extends Resource
{
    protected static ?string $model = PeopleReport::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'report_details';

    public static function getNavigationGroup(): ?string
    {
        return 'Awam';
    }

    public static function getNavigationLabel(): string
    {
        return 'Laporan Orang Awam';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-flag';
    }

    public static function getNavigationBadge(): ?string
    {
        return '3 baru';
    }

    public static function form(Schema $schema): Schema
    {
        return PeopleReportForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PeopleReportInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PeopleReportsTable::configure($table);
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
            'index' => ListPeopleReports::route('/'),
            'create' => CreatePeopleReport::route('/create'),
            'view' => ViewPeopleReport::route('/{record}'),
            'edit' => EditPeopleReport::route('/{record}/edit'),
        ];
    }
}
