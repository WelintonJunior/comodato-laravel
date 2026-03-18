<?php

namespace App\Filament\Resources\Pdvs\Pages;

use App\Filament\Resources\Pdvs\PdvResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPdv extends EditRecord
{
    protected static string $resource = PdvResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
