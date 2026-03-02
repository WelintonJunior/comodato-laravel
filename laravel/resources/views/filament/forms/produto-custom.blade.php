<div class="produto-custom">

    <style>
        .produto-custom {
            width: 100%;
            font-family: Inter, system-ui;
            color: #0f172a;
        }

        .produto-card {
            background: #a5a5a5;
            padding: 18px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .fornecedor-row {
            display: flex;
            gap: 16px;
        }

        .produto-main {
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
        }

        .action-btn.danger {
            background: #fff5f5;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        input[type="hidden"][name^="pro"] {
            display: none !important;
        }

          form .fi-ac.fi-align-start {
    display: none !important;
  }
    </style>

    <div class="produto-card">
        <div class="fornecedor-row">

            {{-- CONTEÚDO --}}
            <div class="produto-main">
                <div class="form-grid">

                    <div class="col-6">
                        <label>Item</label>
                        <input id="custom-proItem">
                    </div>

                    <div class="col-6">
                        <label>Descrição</label>
                        <input id="custom-proDescriao">
                    </div>

                    <div class="col-4">
                        <label>Preço de Custo</label>
                        <input type="number" step="0.01" id="custom-proPrecoCusto">
                    </div>

                    <div class="col-4">
                        <label>Preço de Venda</label>
                        <input type="number" step="0.01" id="custom-proPrecoVenda">
                    </div>

                    <div class="col-4">
                        <label>Lucro</label>
                        <input type="number" step="0.01" id="custom-proLucro">
                    </div>

                    <div class="col-3">
                        <label>Saldo Atual</label>
                        <input type="number" id="custom-proSaldoAtual">
                    </div>

                    <div class="col-3">
                        <label>Saldo Mínimo</label>
                        <input type="number" id="custom-proSaldoMinimo">
                    </div>

                    <div class="col-3">
                        <label>Pacote</label>
                        <input type="number" id="custom-proPacote">
                    </div>

                    <div class="col-3">
                        <label>Multiplicador</label>
                        <input type="number" id="custom-proMultiplicador">
                    </div>

                    <div class="col-4">
                        <label>Cód. Automação</label>
                        <input type="number" id="custom-proCodAutomacao">
                    </div>

                    <div class="col-4">
                        <label>ID Núcleo</label>
                        <input type="number" id="custom-proIdNucleo">
                    </div>

                    <div class="col-4">
                        <label>Atalho</label>
                        <input type="number" id="custom-proAtalho">
                    </div>

                    <div class="col-12">
                        <button type="button" id="custom-save" class="save">
                            Salvar Produto
                        </button>
                    </div>

                </div>
            </div>

            {{-- AÇÕES --}}
            <div class="fornecedor-actions">
                <button
                    type="button"
                    class="action-btn"
                    x-on:click="$dispatch('open-modal', { id: 'fornecedor-search-modal' })"
                >
                    Pesquisar
                </button>

                <button class="action-btn">Inserir</button>
                <button class="action-btn">Editar</button>
                <button class="action-btn danger">Deletar</button>
            </div>

        </div>
    </div>

    <script>
        (function () {
            const map = [
                'proItem',
                'proDescriao',
                'proPrecoCusto',
                'proPrecoVenda',
                'proLucro',
                'proSaldoAtual',
                'proSaldoMinimo',
                'proPacote',
                'proMultiplicador',
                'proCodAutomacao',
                'proAtalho',
                'proIdNucleo'
            ];

            document.getElementById('custom-save').onclick = () => {
                map.forEach(field => {
                    const custom = document.getElementById('custom-' + field);
                    const hidden = document.querySelector(`input[name="${field}"]`);
                    if (custom && hidden) hidden.value = custom.value ?? '';
                });

                document.querySelector('form[method="POST"]')?.submit();
            };
        })();
    </script>

</div>
