<?php

namespace App\Filament\Resources\Vendedors\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\ViewField;
use Filament\Schemas\Schema;

class VendedorForm
{
    public static function configure(Schema $schema): Schema
    {
       return $schema->schema([

            ViewField::make('vendedor_custom')
                ->view('filament.forms.vendedor-custom')
                ->columnSpanFull(),

                Hidden::make('venNome')
                    ->required(),
                Hidden::make('venCpf')
                    ->default(null),
                Hidden::make('venRg')
                    ->default(null),
                Hidden::make('venInss')
                    ->default(null),
                Hidden::make('venPrefeitura')
                    ->default(null),
                Hidden::make('venPis')
                    ->default(null),
                Hidden::make('venCelular')
                    ->default(null),
                Hidden::make('venEndereco')
                    ->default(null),
                Hidden::make('venNumero')
                    ->default(null),
                Hidden::make('venBairro')
                    ->default(null),
                Hidden::make('venCidade')
                    ->default(null),
                Hidden::make('venUf')
                    ->default(null),
                Hidden::make('venCep')
                    ->default(null),
                Hidden::make('venDtNasc'),
                Hidden::make('venEstadoCivil')
                    ->required()
                    ->default(0),
                Hidden::make('venConjuge')
                    ->default(null),
                Hidden::make('venNaturalidade')
                    ->default(null),
                Hidden::make('venSexo')
                    ->required()
                    ->default(0),
                Hidden::make('venComple')
                    ->default(null),
                Hidden::make('venBanco')
                    ->default(null),
                Hidden::make('venAgencia')
                    ->default(null),
                Hidden::make('venConta')
                    ->default(null),
                Hidden::make('venEmail')
                    ->default(null),
                Hidden::make('venObservacoes')
                    ->default(null),
                Hidden::make('venLocalizacao')
                    ->default(null),
                Hidden::make('venStatus')
                    ->required()
                    ->default(0),
                Hidden::make('venVinculo')
                    ->default(0),
                Hidden::make('venTips')
                    ->required()
                    ->default(0),
                Hidden::make('venDtCadastro'),
                Hidden::make('venDtDesligamento'),
                Hidden::make('venMaq')
                    ->default(null),
                Hidden::make('venSusMotivo')
                    ->default(null),
                Hidden::make('venImagem')
                    ->default(null),
                Hidden::make('venIdRec')
                    ->default(null),
                Hidden::make('venIdNucleo')
                    ->default(null),
            ]);
    }
}
