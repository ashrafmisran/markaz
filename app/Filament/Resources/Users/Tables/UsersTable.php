<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID')->sortable()->searchable(),
                TextColumn::make('name')->label('Nama')->sortable()->searchable()
                        ->description(fn ($record): string => $record->email),
                TextColumn::make('portfolios')->label('Portfolio')
                    ->formatStateUsing(fn ($state, $record) => 
                        $record
                            ->portfolios
                            ->where('team_id', auth()->user()->current_team_id)
                            ->pluck('name')->join(', ') ?: 'Tiada'
                    )
            ])
            ->filters([
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('assign')
                    ->label('Portfolio')
                    ->badge()
                    ->schema([
                        TextInput::make('team_id')
                            ->default(function () {
                                $user = auth()->user();
                                if (! $user) {
                                    return null;
                                }

                                // Jetstream HasTeams column
                                if (! empty($user->current_team_id)) {
                                    return $user->current_team_id;
                                }

                                // If the user exposes a currentTeam() method, use it (guarded)
                                if (method_exists($user, 'currentTeam')) {
                                    $team = $user->currentTeam();
                                    if ($team) {
                                        return $team->id;
                                    }
                                }

                                // Fallback to first team via relation (if exists)
                                if (method_exists($user, 'teams')) {
                                    $team = $user->teams()->first();
                                    if ($team) {
                                        return $team->id;
                                    }
                                }

                                // last-resort fallback
                                return $user->team_id ?? null;
                            }),
                        Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'lajnah' => 'Lajnah',
                                'jabatan' => 'Jabatan',
                                'unit' => 'Unit',
                            ])
                            ->required(),
                        TextInput::make('portfolio_name')
                            ->label('Nama lajnah/jabatan/unit')
                            ->required(),
                    ])
                    ->action(function ($record, array $data): void {
                        $record->portfolios()->create([
                            'category' => $data['category'],
                            'name' => $data['portfolio_name'],
                            'team_id' => $data['team_id'],
                        ]);
                    })
                    ->icon('heroicon-o-plus'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
