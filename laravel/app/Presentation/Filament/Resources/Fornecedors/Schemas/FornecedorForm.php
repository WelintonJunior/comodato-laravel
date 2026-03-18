<?php

namespace App\Filament\Resources\Fornecedors\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Hidden;

class FornecedorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            ViewField::make('fornecedor_custom')
                ->view('filament.forms.fornecedor-custom')
                ->columnSpanFull(),

            Hidden::make('forId'),
            Hidden::make('forRazSocial'),
            Hidden::make('forIe'),
            Hidden::make('forCnpj'),
            Hidden::make('forTelefone'),
            Hidden::make('forContato'),
            Hidden::make('forCelular'),
            Hidden::make('forCep'),
            Hidden::make('forEndereco'),
            Hidden::make('forNumero'),
            Hidden::make('forBairro'),
            Hidden::make('forCompl'),
            Hidden::make('forCidade'),
            Hidden::make('forEstado'),
            Hidden::make('forSuspenso'),
            Hidden::make('forSusMotivo'),
        ]);
    }
}
