<?php

namespace App\Filament\SuperAdmin\Resources\Divisions\Pages;

use App\Filament\SuperAdmin\Resources\Divisions\DivisionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewDivision extends ViewRecord
{
    protected static string $resource = DivisionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->url(fn ($record) => route('filament.superadmin.resources.divisions.edit', ['record' => $record->getRouteKey()])),
        ];
    }
}
