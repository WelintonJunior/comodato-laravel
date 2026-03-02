<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vendedor;

class VendedorSearch extends Component
{
    public string $search = '';
    public bool $performedSearch = false;

    public function performSearch()
    {
        $this->performedSearch = true;
        // Força o re-render do componente
    }
    
    public function clearSearch()
    {
        $this->search = '';
        $this->performedSearch = false;
    }
    
    public function selectVendedor($id)
    {
        $vendedor = Vendedor::find($id);

        if (! $vendedor) {
            return;
        }

        // Livewire 4 + Filament - forma correta
        $this->dispatch('vendedor-selected', vendedor: $vendedor->toArray());
        
        // Fecha o modal
        $this->dispatch('close-modal', id: 'vendedor-search-modal');
    }

    public function render()
    {
        // Se o usuário clicou em pesquisar OU digitou algo, faz a busca
        if ($this->performedSearch || strlen($this->search) > 0) {
            $vendedores = Vendedor::query()
                ->when($this->search, function($query) {
                    $query->where('venNome', 'like', "%{$this->search}%");
                })
                ->orderBy('venNome')
                ->limit(20)
                ->get();
        } else {
            // Se não clicou em pesquisar e não digitou nada, não mostra resultados
            $vendedores = collect();
        }

        return view('livewire.vendedor-search', compact('vendedores'));
    }
}