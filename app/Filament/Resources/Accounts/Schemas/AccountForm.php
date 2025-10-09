<?php

namespace App\Filament\Resources\Accounts\Schemas;

use App\Models\Team;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;


class AccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('team_id')
                    ->default(fn () => Team::where('public_id', request()->route('tenant'))->first()?->id)
                    ->required(),
                Radio::make('category')
                    ->options([
                        'asset' => 'Aset',
                        'liability' => 'Liabiliti',
                        'equity' => 'Ekuiti',
                        'income' => 'Pendapatan',
                        'expense' => 'Perbelanjaan',
                    ])
                    ->required(),
                TextInput::make('name')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('description')->nullable(),
                TextInput::make('initial_balance')->numeric()->required()->prefix('RM '),
                TextInput::make('code_no')->nullable(),
                TextInput::make('bank_name')->nullable(),
                TextInput::make('bank_account_no')->nullable(),
            ]);
    }
}
