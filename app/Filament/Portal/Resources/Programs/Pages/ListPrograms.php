<?php

namespace App\Filament\Portal\Resources\Programs\Pages;

use Illuminate\Contracts\View\View;
use App\Filament\Portal\Resources\Programs\ProgramResource;
use Filament\Resources\Pages\ListRecords;

class ListPrograms extends ListRecords
{
    protected static string $resource = ProgramResource::class;

    // if you use a custom blade:
    protected string $view = 'filament.portal.resources.programs.card-list';

    public function render(): View
    {
        $records = $this->getTableRecords();

        return view($this->view, [
            'programs' => $records,
        ])->layout($this->getLayout());
    }
}
