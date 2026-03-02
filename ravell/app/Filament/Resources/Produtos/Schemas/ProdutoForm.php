<?php

namespace App\Filament\Resources\Produtos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProdutoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('proItem')
                    ->required(),
                TextInput::make('proDescriao')
                    ->required(),
                TextInput::make('proPrecoCusto')
                    ->required()
                    ->numeric(),
                TextInput::make('proPrecoVenda')
                    ->required()
                    ->numeric(),
                TextInput::make('proLucro')
                    ->required()
                    ->numeric(),
                TextInput::make('proSaldoAtual')
                    ->required()
                    ->numeric(),
                TextInput::make('proPacote')
                    ->required()
                    ->numeric(),
                TextInput::make('proMultiplicador')
                    ->required()
                    ->numeric(),
                TextInput::make('proCodAutomacao')
                    ->required()
                    ->numeric(),
                TextInput::make('proSaldoMinimo')
                    ->required()
                    ->numeric(),
                TextInput::make('proLucroP')
                    ->numeric(),
                TextInput::make('proAtalho')
                    ->numeric(),
                TextInput::make('proAtalhoLabel'),
                TextInput::make('proPrecoVendedor')
                    ->numeric(),
                TextInput::make('proLucroPVendedor')
                    ->numeric(),
                TextInput::make('proPacoteCheck')
                    ->numeric(),
                TextInput::make('proIdNucleo')
                    ->numeric(),
            ]);
    }
}
