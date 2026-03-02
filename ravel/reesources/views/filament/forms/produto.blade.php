<x-filament.layouts.desktop-form>

    <x-slot name="form">
        <div class="row">
            {{ $getField('id') }}
            {{ $getField('item') }}
        </div>

        <div class="row">
            {{ $getField('descricao') }}
        </div>

        <div class="row">
            {{ $getField('preco_custo') }}
            {{ $getField('estoque_atual') }}
            {{ $getField('estoque_minimo') }}
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-filament::button>Pesquisar</x-filament::button>
        <x-filament::button>Inserir</x-filament::button>
        <x-filament::button>Editar</x-filament::button>
        <x-filament::button>Excluir</x-filament::button>
        <x-filament::button color="gray">Sair</x-filament::button>
    </x-slot>

</x-filament.layouts.desktop-form>
