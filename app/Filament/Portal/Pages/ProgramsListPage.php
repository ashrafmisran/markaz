<?php

namespace App\Filament\Portal\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeatable;
use Filament\Forms\Components\Text;
use Filament\Forms\Contracts\HasForms;
use App\Models\Program;

class ProgramsListPage extends Page implements HasForms
{
    protected string $view = 'filament.portal.pages.programs-list-page';

    public string $model = 'App\\Models\\Program';
    
    // programs will be available to the blade view as $programs
    public $programs = [];

    public function mount(): void
    {
        $this->programs = Program::orderBy('program_start', 'desc')->get();
    }


    protected function getHeaderActions(): array
    {
        return [
            Action::make('Create Program')
                ->label('Buat Program')
                ->url(route('filament.portal.resources.programs.create'))
                ->icon('heroicon-o-plus')
                ->color('primary'),
        ];
    }


    public function title(): string
    {
        return 'Senarai Program';
    }
    
    public function grid(): Grid
    {
        return Grid::make()->schema([
            Repeatable::make('programs')->schema([
                Card::make()->schema([
                    Text::make('name')->label('Program Name')->bold()->large(),
                    Text::make('description')->label('Description')->wrap(),
                    // Button::make('View Details')
                    //     ->url(fn ($record) => route('filament.portal.resources.programs.view', ['record' => $record->getRouteKey()]))
                    //     ->color('primary')
                    //     ->icon('heroicon-o-eye')
                    //     ->size('sm')
                    //     ->block(),
                ])->columns(1)->padding(6)->shadow()->rounded()->border(),
            ])->columns(1)->disableLabel()
            ->query(fn () => Program::all())
            ->columnSpan(3)
            ->createItemButtonLabel('Tambah Program Baru')
            ->minItems(1)
            ->maxItems(50)
            ->defaultItems(1)
            ->orderable(),
        ])
        ->columns(3)
        ->columnGap('gap-6')
        ->rowGap('gap-6')
        ->padding(6);
    }
}
