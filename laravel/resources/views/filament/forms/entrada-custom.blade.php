<div class="fornecedor-custom" x-data="{ showList: false }">

    <style>
        .fornecedor-custom {
            width: 100%;
            box-sizing: border-box;
            font-family: Inter, ui-sans-serif, system-ui;
            color: #0f172a;
        }

        .fornecedor-card {
            background: #a5a5a5;
            padding: 18px;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(16, 24, 40, 0.06);
        }

        .fornecedor-row {
            display: flex;
            gap: 16px;
        }

        .fornecedor-main {
            flex: 1;
        }

        .fornecedor-actions {
            width: 220px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns:repeat(12, 1fr);
            gap: 12px;
        }

        .col-12 {
            grid-column: span 12
        }

        .col-6 {
            grid-column: span 6
        }

        .col-4 {
            grid-column: span 4
        }

        .col-3 {
            grid-column: span 3
        }

        label {
            font-weight: 600;
            font-size: .9rem;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #e6edf3;
        }

        .action-btn {
            padding: 10px;
            border-radius: 8px;
            background: #203A63;
            color: #fff;
            text-align: center;
            font-weight: 700;
            cursor: pointer;
        }

        .action-btn.danger {
            background: #fff5f5;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .save {
            background: #203A63;
            color: #fff;
            padding: 10px 14px;
            border-radius: 8px;
            font-weight: 700;
        }

        form .fi-ac.fi-align-start {
            display: none !important;
        }
    </style>

    <div class="fornecedor-card">
        <div class="fornecedor-row">

            {{-- FORM VISUAL --}}
            <div class="fornecedor-main">
                <div class="form-grid">

                    <div class="col-3">
                        <label>Nota Fiscal</label>
                        <input id="custom-entNotaFiscal">
                    </div>

                    <div class="col-3">
                        <label>Data de Entrada</label>
                        <input type="date" id="custom-entDataEntrada">
                    </div>

                    <div class="col-3">
                        <label>Valor da Nota</label>
                        <input type="number" step="0.01" id="custom-entValorNota">
                    </div>

                    <div class="col-3">
                        <label>ID Núcleo</label>
                        <input id="custom-entIdNucleo">
                    </div>

                    <div class="col-12">
                        <label>Chave da Nota</label>
                        <input id="custom-entChave">
                    </div>

                    <div class="col-12">
                        <button type="button" id="custom-save" class="save">Salvar</button>
                    </div>

                </div>
            </div>

            {{-- 🔥 BOTÕES IGUAIS AO ORIGINAL --}}
            <div class="fornecedor-actions">
                <button
                    type="button"
                    class="action-btn"
                    x-on:click="$dispatch('open-modal', { id: 'fornecedor-search-modal' })"
                >
                    Pesquisar
                </button>

                <a class="action-btn">Inserir</a>
                <a class="action-btn">Editar</a>
                <a class="action-btn danger">Deletar</a>
            </div>

        </div>
    </div>

    {{-- MODAL --}}
    <x-filament::modal id="fornecedor-search-modal" width="4xl">
        <livewire:fornecedor-search-table/>
    </x-filament::modal>

    {{-- JS --}}
    <script>
        (function () {

            const map = [
                ['custom-entNotaFiscal', 'entNotaFiscal'],
                ['custom-entDataEntrada', 'entDataEntrada'],
                ['custom-entValorNota', 'entValorNota'],
                ['custom-entChave', 'entChave'],
                ['custom-entIdNucleo', 'entIdNucleo'],
            ];

            function syncToHidden() {
                map.forEach(([c, h]) => {
                    const custom = document.getElementById(c);
                    const hidden = document.querySelector(`input[name="${h}"]`);
                    if (custom && hidden) hidden.value = custom.value ?? '';
                });
            }

            document.getElementById('custom-save')?.addEventListener('click', () => {
                syncToHidden();
                document.querySelector('form[method="POST"]')?.submit();
            });

            document.addEventListener('livewire:init', () => {
                Livewire.on('fornecedor-selected', data => {
                    const hidden = document.querySelector('input[name="entIdFornecedor"]');
                    if (hidden) hidden.value = data.id;
                });
            });

        })();
    </script>

</div>
