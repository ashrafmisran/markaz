<?php

namespace App\Filament\Resources\Meetings\Pages;

use App\Filament\Resources\Meetings\MeetingResource;
use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMeetings extends ListRecords
{
    protected static string $resource = MeetingResource::class;

    //protected string $view = 'filament.pages.meetings.list';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    // public function getContent(): ?\Illuminate\Contracts\View\View
    // {
    //     $records = $this->getTableRecords();
    //     return view($this->view, ['meetings' => $records]);
    // }
}
