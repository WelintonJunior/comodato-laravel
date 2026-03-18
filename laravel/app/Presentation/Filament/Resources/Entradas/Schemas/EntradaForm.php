<?php

namespace App\Filament\Resources\Entradas\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\ViewField;
use Filament\Schemas\Schema;

class EntradaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            ViewField::make('fornecedor_custom')
                ->view('filament.forms.entrada-custom')
                ->columnSpanFull(), 
                
                Hidden::make('entNotaFiscal'),
                Hidden::make('entIdFornecedor'),
                Hidden::make('entDataEntrada'),
                Hidden::make('entValorNota'),
                Hidden::make('entChave'),
                Hidden::make('entIdNucleo'),
            ]);
    }
}
