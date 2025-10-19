<?php

namespace App\Filament\Resources\Meetings\RelationManagers;

use App\Filament\Resources\Agendas\AgendaResource;
use Filament\Actions\CreateAction;
use Filament\Actions\Action;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class AgendasRelationManager extends RelationManager
{
    protected static string $relationship = 'agendas';

    protected static ?string $relatedResource = AgendaResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Action::make('Tambah agenda')
                    ->action('create')
                    ->icon('heroicon-o-plus')
                    ->color('primary'),
                Action::make('Muat naik csv')
                    ->action('importFromTemplate')
                    ->icon('heroicon-o-document-text')
                    ->color('warning'),
            ])
            ->paginated(false);
    }
}
