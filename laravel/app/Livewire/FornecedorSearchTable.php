<?php

namespace App\Livewire;

use App\Models\Fornecedor;
use Livewire\Component;

class FornecedorSearchTable extends Component
{

    public string $search = '';
    public function selectFornecedor($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        $this->dispatch('fornecedor-selected', [
            'id' => $fornecedor->forId,
            'razao' => $fornecedor->forRazSocial,
        ]);
    }

    public function render()
    {
        return view('livewire.fornecedor-search-table', [
            'fornecedores' => Fornecedor::orderBy('forRazSocial')->limit(20)->get(),
        ]);
        $fornecedores = Fornecedor::where('forRazSocial', 'like', "%{$this->search}%")
        ->limit(10)
        ->get();
    }
}
