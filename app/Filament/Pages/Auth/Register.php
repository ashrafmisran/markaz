<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Component;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;

class Register extends BaseRegister
{
    /**
     * Add the extra MyKad field into the registration form.
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),

                TextInput::make('mykad')
                    ->label('MyKad')
                    ->required()
                    ->maxLength(12)
                    ->unique($this->getUserModel()),

                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }

    /**
     * Keep the default registration handler (creates the user with the form data).
     * We override only if you want to perform custom actions during registration.
     *
     * @param array<string,mixed> $data
     */
    protected function handleRegistration(array $data): Model
    {
        return $this->getUserModel()::create($data);
    }
}
