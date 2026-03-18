<?php

namespace App\Filament\Resources\Entradas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EntradasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('entNotaFiscal')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('entIdFornecedor')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('entDataEntrada')
                    ->date()
                    ->sortable(),
                TextColumn::make('entValorNota')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('entChave')
                    ->searchable(),
                TextColumn::make('entIdNucleo')
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
