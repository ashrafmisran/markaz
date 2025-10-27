<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

    protected function handleRegistration(array $data): User
    {
        $data = $this->form->getState();

        
        $user = User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'mykad' => $data['mykad'],
          'password' => Hash::make($data['password']),
        ]);
        
        //dd($user);
          
        auth()->login($user);

        // Attach the user to a default team
        $user->teams()->syncWithoutDetaching([1]);

        return $user;
    }

    protected function afterRegister(): void
    {
        if (! auth()->check()) {
            return;
        }

        $user = auth()->user();

        // now do whatever you need with $user
    }
}
