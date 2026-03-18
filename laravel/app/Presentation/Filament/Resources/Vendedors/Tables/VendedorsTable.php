<?php

namespace App\Filament\Resources\Vendedors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VendedorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('venNome')
                    ->searchable(),
                TextColumn::make('venCpf')
                    ->searchable(),
                TextColumn::make('venRg')
                    ->searchable(),
                TextColumn::make('venInss')
                    ->searchable(),
                TextColumn::make('venPrefeitura')
                    ->searchable(),
                TextColumn::make('venPis')
                    ->searchable(),
                TextColumn::make('venCelular')
                    ->searchable(),
                TextColumn::make('venEndereco')
                    ->searchable(),
                TextColumn::make('venNumero')
                    ->searchable(),
                TextColumn::make('venBairro')
                    ->searchable(),
                TextColumn::make('venCidade')
                    ->searchable(),
                TextColumn::make('venUf')
                    ->searchable(),
                TextColumn::make('venCep')
                    ->searchable(),
                TextColumn::make('venDtNasc')
                    ->date()
                    ->sortable(),
                TextColumn::make('venEstadoCivil')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('venConjuge')
                    ->searchable(),
                TextColumn::make('venNaturalidade')
                    ->searchable(),
                TextColumn::make('venSexo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('venComple')
                    ->searchable(),
                TextColumn::make('venBanco')
                    ->searchable(),
                TextColumn::make('venAgencia')
                    ->searchable(),
                TextColumn::make('venConta')
                    ->searchable(),
                TextColumn::make('venEmail')
                    ->searchable(),
                TextColumn::make('venObservacoes')
                    ->searchable(),
                TextColumn::make('venLocalizacao')
                    ->searchable(),
                TextColumn::make('venStatus')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('venVinculo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('venTips')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('venDtCadastro')
                    ->date()
                    ->sortable(),
                TextColumn::make('venDtDesligamento')
                    ->date()
                    ->sortable(),
                TextColumn::make('venMaq')
                    ->searchable(),
                TextColumn::make('venSusMotivo')
                    ->searchable(),
                TextColumn::make('venImagem'),
                TextColumn::make('venIdRec')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('venIdNucleo')
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
