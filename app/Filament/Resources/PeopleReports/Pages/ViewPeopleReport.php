<?php

namespace App\Filament\Resources\PeopleReports\Pages;

use App\Filament\Resources\PeopleReports\PeopleReportResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewPeopleReport extends ViewRecord
{
    protected static string $resource = PeopleReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
