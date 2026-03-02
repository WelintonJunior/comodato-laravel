<?php

namespace App\Filament\Resources\Sorteios;

use App\Filament\Resources\Sorteios\Pages\CreateSorteio;
use App\Filament\Resources\Sorteios\Pages\EditSorteio;
use App\Filament\Resources\Sorteios\Pages\ListSorteios;
use App\Filament\Resources\Sorteios\Schemas\SorteioForm;
use App\Filament\Resources\Sorteios\Tables\SorteiosTable;
use App\Models\Sorteio;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SorteioResource extends Resource
{
    protected static ?string $model = Sorteio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return SorteioForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SorteiosTable::configure($table);
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
            'index' => ListSorteios::route('/'),
            'create' => CreateSorteio::route('/create'),
            'edit' => EditSorteio::route('/{record}/edit'),
        ];
    }
}
