<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vendedor;

class VendedorSearchCard extends Component
{
    public string $search = '';

    public function selectVendedor($id)
    {
        $v = Vendedor::findOrFail($id);

        $this->dispatch('vendedor-selected', [
            'venNome' => $v->venNome,
            'venCpf'  => $v->venCpf,
            'venRg'   => $v->venRg,
            'venCelular' => $v->venCelular,
            'venEndereco' => $v->venEndereco,
            'venNumero' => $v->venNumero,
            'venBairro' => $v->venBairro,
            'venCidade' => $v->venCidade,
            'venUf' => $v->venUf,
            'venCep' => $v->venCep,
        ]);
    }

    public function render()
    {
        $vendedores = [];

        if (strlen($this->search) >= 2) {
            $vendedores = Vendedor::query()
                ->where('venNome', 'like', "%{$this->search}%")
                ->orWhere('venCpf', 'like', "%{$this->search}%")
                ->limit(10)
                ->get();
        }

        return view('livewire.vendedor-search-card', [
            'vendedores' => $vendedores,
        ]);
    }
}
