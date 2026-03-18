<?php

namespace App\Filament\Resources\Fornecedors;

use App\Filament\Resources\Fornecedors\Pages\CreateFornecedor;
use App\Filament\Resources\Fornecedors\Pages\EditFornecedor;
use App\Filament\Resources\Fornecedors\Pages\ListFornecedors;
use App\Filament\Resources\Fornecedors\Schemas\FornecedorForm;
use App\Filament\Resources\Fornecedors\Tables\FornecedorsTable;
use App\Models\Fornecedor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FornecedorResource extends Resource
{
    protected static ?string $model = Fornecedor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return FornecedorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FornecedorsTable::configure($table);
    }

    public static function getModelLabel(): string
    {
        return 'Fornecedor';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Fornecedores';
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'list' => ListFornecedors::route('/list'),
            'index' => CreateFornecedor::route('/'),
            'edit' => EditFornecedor::route('/{record}/edit'),
        ];
    }
}
