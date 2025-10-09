<?php

namespace App\Filament\SuperAdmin\Resources\States\Pages;

use App\Filament\SuperAdmin\Resources\States\StateResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewState extends ViewRecord
{
    protected static string $resource = StateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->url(fn ($record) => route('filament.superadmin.resources.states.edit', ['record' => $record->getRouteKey()])),
        ];
    }
}
