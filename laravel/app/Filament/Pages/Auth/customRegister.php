<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Register;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Validation\Rules\Password;

class CustomRegister extends Register
{
        public function mount(): void
    {
        parent::mount();
        Notification::make()
            ->warning() 
            ->title('Atenção')
            ->body('Este é o registro personalizado. Confirme o nome do ficheiro: CustomRegister.php')
            ->send();
    }
    
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome Completo')
                            ->required()
                            ->maxLength(255)
                            ->autofocus(),
                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique('users'),
                        TextInput::make('password')
                            ->label('Senha')
                            ->password()
                            ->required()
                            ->minLength(8)
                            ->rule(Password::default()),
                        TextInput::make('passwordConfirmation')
                            ->label('Confirmar Senha')
                            ->password()
                            ->required()
                            ->same('password'),
                    ])
                    ->statePath('data'),
            ),
        ];
    }
}