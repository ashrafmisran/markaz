<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class Register extends BaseRegister
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
              $this->getNameFormComponent(),
              $this->getEmailFormComponent(),
              TextInput::make('mykad')
                ->label('No. MyKad')
                ->required()
                ->maxLength(12),
              $this->getPasswordFormComponent(),
              $this->getPasswordConfirmationFormComponent(),
            ]);
    }
}