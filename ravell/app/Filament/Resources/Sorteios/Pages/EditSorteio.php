<?php

namespace App\Filament\Resources\Sorteios\Pages;

use App\Filament\Resources\Sorteios\SorteioResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSorteio extends EditRecord
{
    protected static string $resource = SorteioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
