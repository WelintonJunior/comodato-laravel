<?php

namespace App\Filament\Resources\Fornecedors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FornecedorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('forRazSocial')
                    ->searchable(),
                TextColumn::make('forCnpj')
                    ->searchable(),
                TextColumn::make('forCep')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('forTelefone')
                    ->searchable(),
                TextColumn::make('forContato')
                    ->searchable(),
                TextColumn::make('forNumero')
                    ->searchable(),
                TextColumn::make('forComplemento')
                    ->searchable(),
                TextColumn::make('forIe')
                    ->searchable(),
                IconColumn::make('forSuspenso')
                    ->boolean(),
                TextColumn::make('forSusMotivo'),
                TextColumn::make('forIdNucleo')
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
