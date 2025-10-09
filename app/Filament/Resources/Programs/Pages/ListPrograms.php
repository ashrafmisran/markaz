<?php

namespace App\Filament\Resources\Programs\Pages;

use App\Filament\Resources\Programs\ProgramResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class ListPrograms extends ListRecords
{
    protected static string $resource = ProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            Tab::make('Organisasi ini')
                ->modifyQueryUsing(fn ($query) => $query->where('team_id', auth()->user()->current_team_id)),
            Tab::make('Semua organisasi di Negeri Sembilan')
                ->modifyQueryUsing(fn ($query) => $query),
        ];
    }
}
