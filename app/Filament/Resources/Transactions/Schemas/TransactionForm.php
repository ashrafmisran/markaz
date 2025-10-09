<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('team_id')
                    ->default(fn () => Team::where('public_id', request()->route('tenant'))->first()?->id)
                    ->required(),
                Hidden::make('creator_id')
                    ->default(fn () => auth()->id())
                    ->required(),
                TextInput::make('name')
                    ->label('Transaction Name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Description')
                    ->maxLength(65535),
                TextInput::make('debit_amount')
                    ->label('Debit Amount')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01),
                TextInput::make('credit_amount')
                    ->label('Credit Amount')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->step(0.01),
                DatePicker::make('transaction_date')
                    ->label('Transaction Date')
                    ->required()
                    ->date(),
            ]);
    }
}
