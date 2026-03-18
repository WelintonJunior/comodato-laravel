<?php

namespace App\Filament\Resources\Fornecedors\Pages;

use App\Filament\Resources\Fornecedors\FornecedorResource;
use App\Filament\Resources\Fornecedors\Tables\FornecedorsTable;
use Filament\Resources\Pages\CreateRecord;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class CreateFornecedor extends CreateRecord implements HasTable
{
 use InteractsWithTable;

    protected static string $resource = FornecedorResource::class;

    public function table(Table $table): Table
    {
        return FornecedorsTable::configure($table)
            ->heading('Fornecedores cadastrados')
            ->paginated([5]);
    }

    protected function getViewData(): array
    {
        return [
            'fornecedorTable' => $this->table,
        ];
    }
}
