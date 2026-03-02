<?php

namespace App\Filament\Resources\Sorteios\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SorteioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('sorData'),
                TextInput::make('sorIdNucleo')
                    ->numeric(),
            ]);
    }
}
