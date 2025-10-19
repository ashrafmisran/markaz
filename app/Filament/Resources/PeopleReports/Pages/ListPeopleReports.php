<?php

namespace App\Filament\Resources\PeopleReports\Pages;

use App\Filament\Resources\PeopleReports\PeopleReportResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPeopleReports extends ListRecords
{
    protected static string $resource = PeopleReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
