<?php

namespace App\Filament\Resources\Transactions\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTransaction extends ViewRecord
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->url(fn ($record) => route('filament.admin.resources.transactions.edit', ['tenant' => request()->route('tenant'), 'record' => $record->getRouteKey()])),
        ];
    }
}
