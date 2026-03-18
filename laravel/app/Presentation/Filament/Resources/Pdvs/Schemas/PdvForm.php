<?php

namespace App\Filament\Resources\Pdvs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PdvForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('pdvDesignacao')
                    ->required(),
                TextInput::make('pdvLocalFixo')
                    ->required(),
                TextInput::make('pdvCapacidade')
                    ->required()
                    ->numeric(),
                Toggle::make('pdvSuspenso')
                    ->required(),
                TextInput::make('pdvIdNucleo')
                    ->numeric(),
                TextInput::make('pdvMotivoSuspenso'),
            ]);
    }
}
