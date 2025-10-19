<?php

namespace App\Filament\Resources\PeopleReports\Pages;

use App\Filament\Resources\PeopleReports\PeopleReportResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditPeopleReport extends EditRecord
{
    protected static string $resource = PeopleReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
