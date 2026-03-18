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

            // Campos correspondentes às colunas do banco
            Hidden::make('idVendedor'), // Para leitura/atualização
            
            Hidden::make('venCpf')
                ->default(null),
                
            Hidden::make('venRg')
                ->default(null),
                
            Hidden::make('venDtNasc'),
                
            Hidden::make('venCep')
                ->default(null),
                
            Hidden::make('venSuspenso')
                ->default(0),
                
            Hidden::make('venSusMotivo')
                ->default(null),
                
            Hidden::make('venChave')
                ->default(null),
                
            Hidden::make('venCelular')
                ->default(null),
                
            Hidden::make('venNumCasa')
                ->default(null),
                
            Hidden::make('venCompCasa')
                ->default(null),
                
            Hidden::make('venInss')
                ->default(null),
                
            Hidden::make('venPrefeitura')
                ->default(null),
                
            Hidden::make('venNome')
                ->required(),
                
            Hidden::make('venIdNucleo')
                ->default(null),
                
            Hidden::make('venAltura')
                ->default(null),
                
            Hidden::make('venPeso')
                ->default(null),
                
            Hidden::make('venSexo')
                ->required()
                ->default(''),
                
            Hidden::make('venCalcado')
                ->default(null),
                
            Hidden::make('venTorax')
                ->default(null),
                
            Hidden::make('venCabeca')
                ->default(null),
                
            Hidden::make('venCintura')
                ->default(null),
                
            Hidden::make('venQuadril')
                ->default(null),
                
            Hidden::make('venBusto')
                ->default(null),
                
            Hidden::make('venPescoco')
                ->default(null),
                
            Hidden::make('venCoxa')
                ->default(null),
                
            Hidden::make('venImagem')
                ->default(null),
                
            Hidden::make('venStatus')
                ->required()
                ->default(''),
                
            Hidden::make('venCracha')
                ->default(null),
                
            Hidden::make('venCrachaLiberado')
                ->default(''),
                
            Hidden::make('venCrachaData'),
                
            Hidden::make('venIdMaquineta')
                ->default(null),
                
            Hidden::make('venEmail')
                ->default(null),
        ]);
    }
}