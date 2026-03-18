<div class="sorteio-custom">
    <style>
        .sorteio-custom {
            width: 100%;
            font-family: Inter, system-ui;
            color: #0f172a;
        }

        .sorteio-card {
            background: #a5a5a5;
            padding: 18px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            margin-bottom: 24px; /* evita sobreposição do footer */
        }

        .sorteio-custom {
            padding-bottom: 120px; /* garante espaçamento extra para o footer */
        }

        .sorteio-row {
            display: flex;
            gap: 16px;
        }

        .sorteio-main {
            flex: 1;
        }

        .sorteio-actions {
            width: 220px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 12px;
        }

        .col-12 { grid-column: span 12 }
        .col-6  { grid-column: span 6 }
        .col-4  { grid-column: span 4 }
        .col-3  { grid-column: span 3 }

        label {
            font-weight: 600;
            font-size: .8rem;
        }

        input {
            width: 100%;
            padding: 9px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        .save {
            background: #203A63;
            color: #fff;
            padding: 10px 14px;
            border-radius: 8px;
            font-weight: 700;
            border: none;
            cursor: pointer;
        }

        .action-btn {
            background: #203A63;
            color: #fff;
            padding: 10px;
            border-radius: 8px;
            font-weight: 700;
            border: none;
            cursor: pointer;
            text-align: center;
            margin-bottom: 2px;
        }

        .action-btn.danger {
            background: #fff5f5;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        input[type="hidden"][name^="sor"] {
            display: none !important;
        }

          form .fi-ac.fi-align-start {
    display: none !important;
  }
    </style>

    <div class="sorteio-card">
        <div class="sorteio-row">

            {{-- CONTEÚDO --}}
            <div class="sorteio-main">
                <div class="form-grid">

                    <div class="col-6">
                        <label>Data do Sorteio</label>
                        <input type="datetime-local" id="custom-sorData">
                    </div>

                    <div class="col-6">
                        <label>Núcleo</label>
                        <input id="custom-sorIdNucleo">
                    </div>

                    <div class="col-6">
                        <label>Vendedor</label>
                        <input id="custom-vendedor">
                    </div>

                    <div class="col-6">
                        <label>Pontos de Vendas Ativos</label>
                        <input type="text" readonly value="{{ $pontos_vendas_ativos }}">
                    </div>

                    <div class="col-12">
                        <button
                            type="button"
                            id="custom-save"
                            class="save"
                            wire:click="salvarSorteio"
                            @disabled(!$sorteioConcluido)
                            style="{{ !$sorteioConcluido ? 'opacity:.6;cursor:not-allowed;' : '' }}"
                        >
                            Salvar Sorteio
                        </button>
                    </div>

                </div>
            </div>

            {{-- AÇÕES --}}
            <div class="sorteio-actions">
                <!-- <button
                    type="button"
                    class="action-btn"
                    wire:click="carregarVendedoresLiberados"
                >
                    Carregar liberados
                </button> -->

                <button
                    class="action-btn" 
                    wire:click="sortearPdv"
                    @disabled(! $sorteioAberto || count($a_vendedores_selecionados) < 2)
                    style="{{ (! $sorteioAberto || count($a_vendedores_selecionados) < 2) ? 'opacity:.6;cursor:not-allowed;' : '' }}"
                >
                    Sortear
                </button>
                <button class="action-btn" wire:click="limparSorteio">Limpar</button>

                <button class="action-btn" x-on:click="$dispatch('open-modal', { id: 'sorteio-search-modal' })">
                    Pesquisar
                </button>

                <button
                    class="action-btn"
                    wire:click="abrirSorteio"
                    @disabled($sorteioAberto)
                    style="{{ $sorteioAberto ? 'background: orange; color:black; cursor:not-allowed;' : '' }}"
                >
                    Abrir
                </button>

                <button class="action-btn" wire:click="sairSorteio">Sair</button>

                <button class="action-btn" @disabled(true) style="opacity:.6;cursor:not-allowed;">Editar</button>
                <button class="action-btn danger" @disabled(true) style="opacity:.6;cursor:not-allowed;">Deletar</button>
                <button class="action-btn" @disabled(!$salvo) style="{{ !$salvo ? 'opacity:.6;cursor:not-allowed;' : '' }}">Imprimir</button>
            </div>

        </div>
    </div>

    <div class="sorteio-card" style="margin-top:16px;">
        <div class="sorteio-row">
            <div class="sorteio-main">
                <h3>Vendedores liberados</h3>
                <ul>
                    @foreach($a_vendedores_liberados as $vend)
                        <li>
                            <button
                                type="button"
                                class="action-btn"
                                wire:click="selecionarVendedor({{ $vend['vendedor_id'] }})"
                                @disabled(! $sorteioAberto)
                                style="{{ ! $sorteioAberto ? 'opacity:.6;cursor:not-allowed;' : '' }}"
                            >
                                {{ $vend['vendedor_nome'] }}
                            </button>
                        </li>
                    @endforeach
                </ul>

                <h3>Vendedores escalados ({{ count($a_vendedores_selecionados) }})</h3>
                <ul>
                    @foreach($a_vendedores_selecionados as $vend)
                        <li>
                            {{ $vend['vendedor_nome'] }}
                            <button type="button" class="action-btn danger" wire:click="removerVendedorSelecionado({{ $vend['vendedor_id'] }})">x</button>
                        </li>
                    @endforeach
                </ul>

                <h3>Resultado do sorteio</h3>
                <table style="width:100%;border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th style="border:1px solid #ccc;padding:4px;">ID</th>
                            <th style="border:1px solid #ccc;padding:4px;">Nome</th>
                            <th style="border:1px solid #ccc;padding:4px;">Número sorteado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pdv_atribuido as $item)
                            <tr>
                                <td style="border:1px solid #ccc;padding:4px;">{{ $item['vendedor_id'] }}</td>
                                <td style="border:1px solid #ccc;padding:4px;">{{ $item['vendedor_nome'] }}</td>
                                <td style="border:1px solid #ccc;padding:4px;">{{ $item['numero_sorteado'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // eventuais scripts para mapear campos e enviar via Livewire ou AJAX
    </script>
</div>