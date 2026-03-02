<div class="mt-24 flex justify-center">
    <div class="w-full max-w-4xl bg-gray-100 rounded-xl shadow-xl p-6 space-y-4">

        <h3 class="text-lg font-semibold text-gray-800">
            Selecionar fornecedor
        </h3>

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white">
            <table class="w-full text-sm text-gray-700">
                <thead class="bg-gray-200 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Razão Social</th>
                        <th class="px-4 py-3 text-center">Ação</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach($fornecedores as $f)
                        <tr class="hover:bg-gray-50 transition cursor-pointer">
                            <td class="px-4 py-3 font-medium">
                                {{ $f->forId }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $f->forRazSocial }}
                            </td>

                            <td class="px-4 py-3 text-center">
                                <button
                                    wire:click="selectFornecedor({{ $f->forId }})"
                                    class="px-3 py-1.5 text-xs font-semibold
                                           bg-primary-600 hover:bg-primary-700
                                           text-white rounded-lg transition"
                                >
                                    Selecionar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
