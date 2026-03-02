<?php

namespace App\Filament\Resources\Pdvs\Pages;

use App\Filament\Resources\Pdvs\PdvResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPdvs extends ListRecords
{
    protected static string $resource = PdvResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
