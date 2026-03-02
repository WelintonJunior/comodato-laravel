<?php

namespace App\Filament\Resources\Sorteios\Pages;

use App\Filament\Resources\Sorteios\SorteioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSorteios extends ListRecords
{
    protected static string $resource = SorteioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
