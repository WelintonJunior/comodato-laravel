<?php

namespace App\Filament\Resources\Pdvs;

use App\Filament\Resources\Pdvs\Pages\CreatePdv;
use App\Filament\Resources\Pdvs\Pages\EditPdv;
use App\Filament\Resources\Pdvs\Pages\ListPdvs;
use App\Filament\Resources\Pdvs\Schemas\PdvForm;
use App\Filament\Resources\Pdvs\Tables\PdvsTable;
use App\Models\Pdv;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PdvResource extends Resource
{
    protected static ?string $model = Pdv::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PdvForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PdvsTable::configure($table);
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
            'index' => ListPdvs::route('/'),
            'create' => CreatePdv::route('/create'),
            'edit' => EditPdv::route('/{record}/edit'),
        ];
    }
}
