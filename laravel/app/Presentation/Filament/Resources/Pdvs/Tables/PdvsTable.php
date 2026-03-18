<?php

namespace App\Filament\Resources\Pdvs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PdvsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pdvDesignacao')
                    ->searchable(),
                TextColumn::make('pdvLocalFixo')
                    ->searchable(),
                TextColumn::make('pdvCapacidade')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('pdvSuspenso')
                    ->boolean(),
                TextColumn::make('pdvIdNucleo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('pdvMotivoSuspenso'),
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
