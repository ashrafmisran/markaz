<?php

namespace App\Filament\Resources\Accounts\Pages;

use App\Filament\Resources\Accounts\AccountResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class ListAccounts extends ListRecords
{
    protected static string $resource = AccountResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            Tab::make('Kunci kira-kira')
                ->modifyQueryUsing(fn ($query) => $query->where('category',['asset','liability','equity'])),
            Tab::make('Penyata pendapatan')
                ->modifyQueryUsing(fn ($query) => $query->where('category',['income','expense'])),
        ];
    }
}
