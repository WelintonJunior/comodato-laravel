<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Auth\Pages\Login;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use Filament\Schemas\Schema;

class CustomLogin extends Login
{
    protected static bool $shouldRegisterNavigation = false;

    public string $view = 'filament.pages.custom-login';

    protected function hasFooter(): bool
    {
        return false;
    }

    public function mount(): void
    {
        parent::mount();

        Notification::make()
            ->danger()
            ->title('Atenção')
            ->body(
                '<div style="text-align: center;">
                    <strong style="font-size: 16px;">
                        Tela ainda em desenvolvimento
                    </strong><br><br>
                    Use seu login e senha.<br>
                    Caso encontre algum problema, entre em contato com o suporte.
                </div>'
            )
            ->send();
    }

    /**
     * 🔥 SUBSTITUI O CAMPO DE EMAIL DO FILAMENT
     */
    protected function getEmailFormComponent(): TextInput
    {
        return TextInput::make('usuLogin')
            ->label('Login')
            ->required()
            ->type('text')
            ->autocomplete('username')
            ->extraAttributes([
                    'class' => 'input-label',
                ])
            ->placeholder('Digite seu login');
    }

    /**
     * (Opcional, mas recomendado) Campo de senha explícito
     */
    protected function getPasswordFormComponent(): TextInput
    {
        return TextInput::make('password')
            ->label('Senha')
            ->required()
            ->password()
            ->autocomplete('current-password')
            ->extraAttributes([
                'class' => 'input-label',
            ])
            ->placeholder('Digite sua senha');
    }



/**
     * 🚫 REMOVE O CAMPO "REMEMBER ME"
     * Sobrescreve o método que cria o formulário
     */
    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                // Não inclui getRememberFormComponent()
            ])
            ->statePath('data');
    }

    /**
     * 🚫 DESABILITA A FUNCIONALIDADE "REMEMBER ME"
     */
    protected function hasRemember(): bool
    {
        return false;
    }

    /**
     * 🚫 GARANTE QUE O "REMEMBER ME" NUNCA SERÁ ATIVADO
     */
    protected function shouldRemember(): bool
    {
        return false;
    }




    public function authenticate(): ?LoginResponse
    {
        $data = $this->form->getState();

        $user = User::where('usuLogin', $data['usuLogin'])->first();

        if (! $user || $user->password !== $data['password']) {
            throw ValidationException::withMessages([
                'usuLogin' => __('filament::login.messages.failed'),
            ]);
        }

        if (isset($user->active) && ! $user->active) {
            throw ValidationException::withMessages([
                'usuLogin' => 'Sua conta está desativada.',
            ]);
        }

        Auth::guard(config('filament.auth.guard'))->login($user);

        session()->regenerate();

        return app(LoginResponse::class);

    }
}
