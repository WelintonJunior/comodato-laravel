<?php

namespace App\Filament\Resources\Produtos\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;
use Filament\Forms\Components\ViewField;

class ProdutoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            ViewField::make('produto_custom')
                ->view('filament.forms.produto-custom')
                ->columnSpanFull(),

                
                Hidden::make('proItem')
                    ->required(),
                Hidden::make('proDescriao')
                    ->required(),
                Hidden::make('proPrecoCusto')
                    ->required(),
                Hidden::make('proPrecoVenda')
                    ->required(),
                Hidden::make('proLucro')
                    ->required(),
                Hidden::make('proSaldoAtual')
                    ->required(),
                Hidden::make('proPacote')
                    ->required(),
                Hidden::make('proMultiplicador')
                    ->required(),
                Hidden::make('proCodAutomacao')
                    ->required(),
                Hidden::make('proSaldoMinimo')
                    ->required(),
                Hidden::make('proLucroP'),
                Hidden::make('proAtalho'),
                Hidden::make('proAtalhoLabel'),
                Hidden::make('proPrecoVendedor'),
                Hidden::make('proLucroPVendedor'),
                Hidden::make('proPacoteCheck'),
                Hidden::make('proIdNucleo'),
        ]);
    }
}
