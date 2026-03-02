<div class="bg-gray-100 rounded-xl p-4 space-y-4">

    <h3 class="text-lg font-bold text-gray-800">
        Pesquisar vendedor
    </h3>

    {{-- INPUT DE PESQUISA --}}
    <input
        type="text"
        wire:model.debounce.400ms="search"
        placeholder="Digite nome ou CPF..."
        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring focus:ring-blue-200"
    />

    {{-- RESULTADOS --}}
    <div class="space-y-2">
        @forelse($vendedores as $v)
            <div class="bg-white rounded-lg p-3 flex justify-between items-center shadow-sm">
                <div>
                    <p class="font-semibold">{{ $v->venNome }}</p>
                    <p class="text-sm text-gray-500">{{ $v->venCpf }}</p>
                </div>

                <button
                    wire:click="selectVendedor({{ $v->id }})"
                    class="px-4 py-1 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700"
                >
                    Selecionar
                </button>
            </div>
        @empty
            @if(strlen($search) >= 2)
                <p class="text-sm text-gray-500">Nenhum vendedor encontrado.</p>
            @endif
        @endforelse
    </div>

</div>
