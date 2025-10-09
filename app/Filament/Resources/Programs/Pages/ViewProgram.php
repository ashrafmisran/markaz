<?php

namespace App\Filament\Resources\Programs\Pages;

use App\Filament\Resources\Programs\ProgramResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProgram extends ViewRecord
{
    protected static string $resource = ProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->url(fn ($record) => route('filament.admin.resources.programs.edit', ['tenant' => request()->route('tenant'), 'record' => $record->getRouteKey()])),
        ];
    }
}
