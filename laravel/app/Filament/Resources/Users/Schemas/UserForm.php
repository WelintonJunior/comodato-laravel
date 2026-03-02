<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name'),
                TextInput::make('usuLogin')
                    ->required(),
                TextInput::make('password')
                    ->password(),
                Toggle::make('usuSuspenso')
                    ->required(),
                TextInput::make('usuCPF'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('usuIdRec')
                    ->numeric(),
                TextInput::make('usuIdNucleo')
                    ->numeric(),
            ]);
    }
}
