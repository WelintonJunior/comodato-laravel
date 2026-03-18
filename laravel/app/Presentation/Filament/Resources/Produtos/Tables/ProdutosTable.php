<?php

namespace App\Filament\Resources\Produtos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProdutosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('proItem')
                    ->searchable(),
                TextColumn::make('proDescriao')
                    ->searchable(),
                TextColumn::make('proPrecoCusto')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proPrecoVenda')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proLucro')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proSaldoAtual')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proPacote')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proMultiplicador')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proCodAutomacao')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proSaldoMinimo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proLucroP')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proAtalho')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proAtalhoLabel')
                    ->searchable(),
                TextColumn::make('proPrecoVendedor')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proLucroPVendedor')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proPacoteCheck')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('proIdNucleo')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
