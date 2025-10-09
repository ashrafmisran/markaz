<?php

namespace App\Filament\Resources\Accounts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;


class AccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('team_id')
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
                    })
                    ->required(),
                Select::make('category')
                    ->options([
                        'asset' => 'Aset',
                        'liability' => 'Liabiliti',
                        'equity' => 'Ekuiti',
                        'income' => 'Pendapatan',
                        'expense' => 'Perbelanjaan',
                    ])
                    ->required(),
                TextInput::make('name')->required(),
                TextInput::make('description')->nullable(),
                TextInput::make('initial_balance')->numeric()->required()->prefix('RM '),
                TextInput::make('code_no')->nullable(),
                TextInput::make('bank_name')->nullable(),
                TextInput::make('bank_account_no')->nullable(),
            ]);
    }
}
