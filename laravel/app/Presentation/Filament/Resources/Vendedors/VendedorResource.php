<?php

namespace App\Filament\Resources\Vendedors;

use App\Filament\Resources\Vendedors\Pages\CreateVendedor;
use App\Filament\Resources\Vendedors\Pages\EditVendedor;
use App\Filament\Resources\Vendedors\Pages\ListVendedors;
use App\Filament\Resources\Vendedors\Schemas\VendedorForm;
use App\Filament\Resources\Vendedors\Tables\VendedorsTable;
use App\Models\Vendedor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VendedorResource extends Resource
{
    protected static ?string $model = Vendedor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return VendedorForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VendedorsTable::configure($table);
    }

    public static function getPluralModelLabel(): string
    {
        return 'Vendedores';
    }

    public static function getModelLabel(): string
    {
        return 'Vendedor';
    }

    public static function getBreadcrumb(): string
    {
        return ''; // Customiza o breadcrumb principal
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
            'list' => ListVendedors::route('/list'),
            'index' => CreateVendedor::route('/'),
            'edit' => EditVendedor::route('/{record}/edit'),
        ];
    }
}
