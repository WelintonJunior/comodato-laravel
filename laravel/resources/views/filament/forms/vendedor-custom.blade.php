<div class="fornecedor-custom" x-data="vendedorCustom()">

    <style>
        .fornecedor-custom {
            width: 100%;
            font-family: Inter, system-ui;
            color: #0f172a;
        }

        .fornecedor-card {
            background: #a5a5a5;
            padding: 18px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            border: 1px solid #e5e7eb;
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
            grid-template-columns: repeat(12, 1fr);
            gap: 12px;
        }

        .col-12 { grid-column: span 12 }
        .col-6 { grid-column: span 6 }
        .col-4 { grid-column: span 4 }
        .col-3 { grid-column: span 3 }
        .col-2 { grid-column: span 2 }

        label {
            font-weight: 600;
            font-size: .8rem;
            color: #334155;
            display: block;
            margin-bottom: 4px;
        }

        input, select, textarea {
            width: 100%;
            padding: 9px 12px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            font-size: 14px;
            transition: all 0.2s;
            background: white;
        }

        input:disabled, select:disabled, textarea:disabled {
            background: #f1f5f9;
            color: #64748b;
            cursor: not-allowed;
            border-color: #e2e8f0;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #203A63;
            box-shadow: 0 0 0 3px rgba(32, 58, 99, 0.1);
        }

        textarea {
            resize: none;
            min-height: 60px;
        }

        .save-btn {
            background: #059669;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .save-btn:hover {
            background: #047857;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(5, 150, 105, 0.2);
        }

        .save-btn:active {
            transform: translateY(0);
        }

        .save-btn:disabled {
            background: #94a3b8;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .action-btn {
            background: #203A63;
            color: white;
            padding: 10px;
            border-radius: 6px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
        }

        .action-btn:hover {
            background: #162a4a;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(32, 58, 99, 0.2);
        }

        .action-btn:active {
            transform: translateY(0);
        }

        .action-btn.danger {
            background: #dc2626;
            color: white;
        }

        .action-btn.danger:hover {
            background: #b91c1c;
        }

        .action-btn:disabled {
            background: #cbd5e1;
            color: #64748b;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .fornecedor-actions button:disabled {
            opacity: 0.6 !important;
            pointer-events: none !important;
        }

        .status-indicator {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-view {
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            text-align: center;
        }

        .status-ativo {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
        }

        .status-inativo {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }

        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e5e7eb;
        }

        .header-title {
            font-size: 18px;
            font-weight: 600;
            color: #1e293b;
        }

        .field-group {
            position: relative;
        }

        .field-group.disabled::after {
            content: "Bloqueado";
            position: absolute;
            right: 10px;
            top: 35px;
            color: #94a3b8;
            font-size: 14px;
        }

        .save-section {
            grid-column: span 12;
            text-align: right;
            margin-top: 10px;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
        }

        .edit-mode-indicator {
            background: #fef3c7;
            color: #92400e;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
            border: 1px solid #fde68a;
        }

        input[type="hidden"][name^="ven"] {
            display: none !important;
        }

        form .fi-ac.fi-align-start {
            display: none !important;
        }

        /* Estilos para mensagens de erro */
        .error-message {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 6px;
            border: 1px solid #fca5a5;
            margin-top: 15px;
            font-size: 14px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .error-message ul {
            margin: 8px 0 0 0;
            padding-left: 20px;
        }

        .error-message li {
            margin-bottom: 4px;
        }

        .loading-indicator {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 10000;
        }

        .loading-indicator.show {
            display: flex;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #203A63;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Novo estilo para garantir que botões desabilitados sejam visíveis */
        .fornecedor-actions button:disabled {
            opacity: 0.6 !important;
            pointer-events: none !important;
        }

        /* Estilo para mensagem de sucesso */
        .success-popup {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #10b981;
            color: white;
            padding: 16px 24px;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            z-index: 10001;
            font-weight: 500;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>

   <!-- Loading indicator global -->
    <div class="loading-indicator" id="global-loader">
        <div class="spinner"></div>
    </div>

    <div class="fornecedor-card">
        <div class="header-actions">
            <div class="header-title">Cadastro de Vendedor</div>
            <div id="status-indicator" class="status-view status-inativo">Modo Visualizacao</div>
        </div>

        <div x-show="editando" class="edit-mode-indicator">
            <span>Modo Edicao - Preencha os dados e clique em "Salvar"</span>
        </div>

        <!-- Mensagem de erro -->
        <div class="error-message" id="error-message">
            <strong>Erro ao processar sua solicitação:</strong>
            <ul id="error-list"></ul>
        </div>

        <div class="fornecedor-row">
            {{-- ================== FORMULÁRIO ================== --}}
            <div class="fornecedor-main">
                <div class="form-grid">
                    
                    {{-- ID (somente leitura) --}}
                    <div class="col-2 field-group">
                        <label>ID Vendedor</label>
                        <input id="custom-idVendedor" disabled>
                    </div>

                    {{-- Dados Pessoais --}}
                    <div class="col-6 field-group">
                        <label>Nome *</label>
                        <input id="custom-venNome" disabled>
                    </div>
                    <div class="col-4 field-group">
                        <label>CPF</label>
                        <input id="custom-venCpf" disabled>
                    </div>

                    <div class="col-3 field-group">
                        <label>RG</label>
                        <input id="custom-venRg" disabled>
                    </div>
                    <div class="col-3 field-group">
                        <label>Data Nascimento</label>
                        <input type="date" id="custom-venDtNasc" disabled>
                    </div>
                    <div class="col-3 field-group">
                        <label>Sexo</label>
                        <select id="custom-venSexo" disabled>
                            <option value="">Selecione</option>
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                        </select>
                    </div>
                    <div class="col-3 field-group">
                        <label>Calcado</label>
                        <input type="number" id="custom-venCalcado" disabled>
                    </div>

                    {{-- Contato --}}
                    <div class="col-4 field-group">
                        <label>Celular</label>
                        <input id="custom-venCelular" disabled>
                    </div>
                    <div class="col-4 field-group">
                        <label>Email</label>
                        <input id="custom-venEmail" disabled>
                    </div>
                    <div class="col-4 field-group">
                        <label>Chave</label>
                        <input id="custom-venChave" disabled>
                    </div>

                    {{-- Endereço --}}
                    <div class="col-3 field-group">
                        <label>CEP</label>
                        <input id="custom-venCep" disabled>
                    </div>
                    <div class="col-2 field-group">
                        <label>Numero Casa</label>
                        <input id="custom-venNumCasa" disabled>
                    </div>
                    <div class="col-3 field-group">
                        <label>Complemento Casa</label>
                        <input id="custom-venCompCasa" disabled>
                    </div>

                    {{-- Medidas Físicas --}}
                    <div class="col-2 field-group">
                        <label>Altura (m)</label>
                        <input type="number" step="0.001" id="custom-venAltura" disabled>
                    </div>
                    <div class="col-2 field-group">
                        <label>Peso (kg)</label>
                        <input type="number" step="0.001" id="custom-venPeso" disabled>
                    </div>
                    <div class="col-2 field-group">
                        <label>Torax (cm)</label>
                        <input type="number" step="0.001" id="custom-venTorax" disabled>
                    </div>
                    <div class="col-2 field-group">
                        <label>Cabeca (cm)</label>
                        <input type="number" step="0.001" id="custom-venCabeca" disabled>
                    </div>
                    <div class="col-2 field-group">
                        <label>Cintura (cm)</label>
                        <input type="number" step="0.001" id="custom-venCintura" disabled>
                    </div>
                    <div class="col-2 field-group">
                        <label>Quadril (cm)</label>
                        <input type="number" step="0.001" id="custom-venQuadril" disabled>
                    </div>

                    <div class="col-2 field-group">
                        <label>Busto (cm)</label>
                        <input type="number" step="0.001" id="custom-venBusto" disabled>
                    </div>
                    <div class="col-2 field-group">
                        <label>Pescoco (cm)</label>
                        <input type="number" step="0.001" id="custom-venPescoco" disabled>
                    </div>
                    <div class="col-2 field-group">
                        <label>Coxa (cm)</label>
                        <input type="number" step="0.001" id="custom-venCoxa" disabled>
                    </div>

                    {{-- Documentos --}}
                    <div class="col-3 field-group">
                        <label>INSS</label>
                        <input id="custom-venInss" disabled>
                    </div>
                    <div class="col-3 field-group">
                        <label>Prefeitura</label>
                        <input id="custom-venPrefeitura" disabled>
                    </div>

                    {{-- Crachá --}}
                    <div class="col-2 field-group">
                        <label>Numero Cracha</label>
                        <input type="number" id="custom-venCracha" disabled>
                    </div>
                    <div class="col-2 field-group">
                        <label>Cracha Liberado</label>
                        <select id="custom-venCrachaLiberado" disabled>
                            <option value="">Selecione</option>
                            <option value="S">Sim</option>
                            <option value="N">Nao</option>
                        </select>
                    </div>
                    <div class="col-2 field-group">
                        <label>Data Cracha</label>
                        <input type="date" id="custom-venCrachaData" disabled>
                    </div>

                    {{-- Sistema --}}
                    <div class="col-3 field-group">
                        <label>Status</label>
                        <select id="custom-venStatus" disabled>
                            <option value="">Selecione</option>
                            <option value="A">Ativo</option>
                            <option value="I">Inativo</option>
                        </select>
                    </div>
                    <div class="col-3 field-group">
                        <label>Suspenso</label>
                        <select id="custom-venSuspenso" disabled>
                            <option value="0">Nao</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                    <div class="col-3 field-group">
                        <label>ID Maquineta</label>
                        <input type="number" id="custom-venIdMaquineta" disabled>
                    </div>

                    {{-- Motivo Suspensão e Imagem --}}
                    <div class="col-12 field-group">
                        <label>Motivo Suspensao</label>
                        <textarea id="custom-venSusMotivo" disabled></textarea>
                    </div>

                    <div class="col-12 field-group">
                        <label>Imagem</label>
                        <input type="file" id="custom-venImagem" disabled accept="image/*">
                        <small class="text-gray-500">Apenas para visualizacao. Upload via sistema principal.</small>
                    </div>
                </div>
            </div>

            {{-- ================== AÇÕES ================== --}}
            <div class="fornecedor-actions">
                <button
                    type="button"
                    class="action-btn"
                    x-on:click="$dispatch('open-modal', { id: 'vendedor-search-modal' })"
                    x-bind:disabled="editando"
                >
                    Pesquisar Vendedor
                </button>

                <button class="action-btn" id="custom-insert" @click="iniciarInserir()" x-bind:disabled="editando">
                    Inserir Novo
                </button>

                <button class="action-btn" id="custom-update" @click="iniciarAtualizar()" x-bind:disabled="!vendedorId || editando">
                    Atualizar Dados
                </button>

                <button class="action-btn danger" id="custom-delete" x-bind:disabled="!vendedorId || editando" @click="excluirVendedor()">
                    Excluir
                </button>

                <!-- Botão Salvar movido para cá -->
                <button 
                    class="save-btn" 
                    @click="salvar()" 
                    x-show="editando" 
                    x-bind:disabled="salvando"
                    style="margin-top: 10px;"
                >
                    <span x-show="!salvando">
                        Salvar
                    </span>
                    <span x-show="salvando">
                        Salvando...
                    </span>
                </button>

                <button class="action-btn" id="custom-cancelar" @click="cancelarEdicao()" x-show="editando" style="background: #6b7280;">
                    Cancelar
                </button>
            </div>
        </div>
    </div>

    {{-- ================== MODAL SEARCH ================== --}}
    <x-filament::modal id="vendedor-search-modal" width="4xl">
        @livewire('vendedor-search')
    </x-filament::modal>

    {{-- ================== ALPINE COMPONENT ================== --}}
    <script>
    function vendedorCustom() {
        return {
            vendedorId: null,
            editando: false,
            mostrarSalvar: false,
            salvando: false,
            syncLock: false,
            
            init() {
                console.log('=== INICIANDO COMPONENTE VENDEDOR CUSTOM ===');
                
                this.desabilitarCampos();
                this.atualizarStatusIndicador();
                this.atualizarEstadoBotoes();
                
                this.setupSyncInterval();
                this.setupFilamentEventListeners();
                
                Livewire.on('vendedor-selected', (vendedorData) => {
                    console.log('Vendedor recebido via Livewire:', vendedorData);
                    this.carregarVendedor(vendedorData);
                });
                
                window.addEventListener('vendedor-selected', (event) => {
                    console.log('Vendedor recebido via evento global:', event.detail);
                    this.carregarVendedor(event.detail);
                });
                
                this.setupInputProtection();
            },

            setupFilamentEventListeners() {
                // Escutar eventos do Livewire
                document.addEventListener('livewire:initialized', () => {
                    console.log('Livewire inicializado');
                });
                
                document.addEventListener('filament-notification-sent', (event) => {
                    console.log('Notificação do Filament:', event.detail);
                    if (event.detail?.status === 'success') {
                        this.salvando = false;
                        this.mostrarLoading(false);
                    }
                });
                
                // Monitorar mudanças na URL
                let lastUrl = window.location.href;
                setInterval(() => {
                    if (window.location.href !== lastUrl) {
                        console.log('URL mudou para:', window.location.href);
                        lastUrl = window.location.href;
                        
                        // Se redirecionou para edição após criação
                        if (window.location.href.includes('/edit') && !this.vendedorId) {
                            this.obterIdDaURL();
                        }
                    }
                }, 1000);
            },

            setupFilamentListeners() {
                // Monitorar eventos do Filament
                document.addEventListener('livewire:init', () => {
                    console.log('Livewire inicializado');
                });
                
                document.addEventListener('livewire:message', (event) => {
                    console.log('Mensagem Livewire:', event.detail);
                });
                
                // Tentar encontrar e monitorar o formulário Filament
                setTimeout(() => {
                    const forms = document.querySelectorAll('form');
                    forms.forEach(form => {
                        if (form.action && !form.action.includes('logout')) {
                            console.log('Formulário Filament encontrado:', form.action);
                            
                            // Adicionar evento de submit
                            form.addEventListener('submit', (e) => {
                                console.log('Formulário Filament submetido');
                                this.syncWithFilament();
                            });
                        }
                    });
                }, 1000);
            },

            setupFilamentEventListeners() {
                // Escutar eventos de salvamento do Filament
                document.addEventListener('filament-notification-close', () => {
                    console.log('Notificação do Filament fechada - salvamento pode ter ocorrido');
                    setTimeout(() => {
                        this.salvando = false;
                        this.mostrarLoading(false);
                    }, 1000);
                });
                
                // Monitorar mudanças na URL (para detectar redirecionamentos após salvar)
                let lastUrl = window.location.href;
                setInterval(() => {
                    const currentUrl = window.location.href;
                    if (lastUrl !== currentUrl) {
                        console.log('URL mudou:', currentUrl);
                        lastUrl = currentUrl;
                        
                        // Se mudou de /create para /edit, é uma inserção
                        if (currentUrl.includes('/edit') && this.editando) {
                            this.editando = false;
                            this.salvando = false;
                            this.atualizarEstadoBotoes();
                        }
                    }
                }, 1000);
            },
            
            setupSyncInterval() {
                setInterval(() => {
                    if (!this.syncLock && !this.editando) {
                        this.syncLock = true;
                        this.syncWithFilament();
                        setTimeout(() => this.syncLock = false, 100);
                    }
                }, 1000);
            },
            
            setupInputProtection() {
                const observer = new MutationObserver((mutations) => {
                    mutations.forEach((mutation) => {
                        if (mutation.type === 'attributes' && mutation.attributeName === 'disabled') {
                            const input = mutation.target;
                            const inputId = input.id;
                            
                            if (this.editando && input.disabled && inputId && inputId.startsWith('custom-')) {
                                setTimeout(() => {
                                    input.disabled = false;
                                }, 50);
                            }
                        }
                    });
                });
                
                document.querySelectorAll('[id^="custom-"]').forEach(input => {
                    observer.observe(input, { attributes: true });
                });
            },
            
            syncWithFilament() {
                // Encontrar todos os formulários na página
                const forms = document.querySelectorAll('form');
                
                forms.forEach(form => {
                    // Pular formulários que não são do Filament ou que são de logout
                    if (form.action && form.action.includes('logout')) return;
                    
                    console.log('Sincronizando com formulário:', {
                        id: form.id,
                        action: form.action,
                        method: form.method
                    });
                    
                    const fieldMap = {
                        'idVendedor': 'idVendedor',
                        'venNome': 'venNome',
                        'venCpf': 'venCpf',
                        'venRg': 'venRg',
                        'venDtNasc': 'venDtNasc',
                        'venCep': 'venCep',
                        'venSuspenso': 'venSuspenso',
                        'venSusMotivo': 'venSusMotivo',
                        'venChave': 'venChave',
                        'venCelular': 'venCelular',
                        'venNumCasa': 'venNumCasa',
                        'venCompCasa': 'venCompCasa',
                        'venInss': 'venInss',
                        'venPrefeitura': 'venPrefeitura',
                        'venAltura': 'venAltura',
                        'venPeso': 'venPeso',
                        'venSexo': 'venSexo',
                        'venCalcado': 'venCalcado',
                        'venTorax': 'venTorax',
                        'venCabeca': 'venCabeca',
                        'venCintura': 'venCintura',
                        'venQuadril': 'venQuadril',
                        'venBusto': 'venBusto',
                        'venPescoco': 'venPescoco',
                        'venCoxa': 'venCoxa',
                        'venStatus': 'venStatus',
                        'venCracha': 'venCracha',
                        'venCrachaLiberado': 'venCrachaLiberado',
                        'venCrachaData': 'venCrachaData',
                        'venIdMaquineta': 'venIdMaquineta',
                        'venEmail': 'venEmail'
                    };
                    
                    Object.keys(fieldMap).forEach(customField => {
                        const formField = fieldMap[customField];
                        const customInput = document.getElementById('custom-' + customField);
                        const hiddenInput = form.querySelector(`[name="${formField}"]`);
                        
                        if (customInput && hiddenInput) {
                            hiddenInput.value = customInput.value;
                        }
                    });
                });
            },
            
            carregarVendedor(vendedorData) {
                let vendedor = vendedorData?.vendedor || vendedorData;
                
                if (!vendedor || typeof vendedor !== 'object') {
                    console.error('Dados do vendedor invalidos:', vendedor);
                    this.mostrarErro(['Dados do vendedor invalidos ou vazio']);
                    return;
                }
                
                console.log('Carregando vendedor:', vendedor);
                
                this.editando = false;
                this.mostrarSalvar = false;
                this.salvando = false;
                this.desabilitarCampos();
                this.limparErros();
                
                const campos = [
                    'idVendedor', 'venNome', 'venCpf', 'venRg', 'venDtNasc', 'venCep', 'venSuspenso',
                    'venSusMotivo', 'venChave', 'venCelular', 'venNumCasa', 'venCompCasa', 'venInss',
                    'venPrefeitura', 'venAltura', 'venPeso', 'venSexo', 'venCalcado',
                    'venTorax', 'venCabeca', 'venCintura', 'venQuadril', 'venBusto', 'venPescoco',
                    'venCoxa', 'venStatus', 'venCracha', 'venCrachaLiberado', 'venCrachaData',
                    'venIdMaquineta', 'venEmail'
                ];
                
                campos.forEach(campo => {
                    const input = document.getElementById('custom-' + campo);
                    if (input) {
                        let valor = vendedor[campo] || '';
                        
                        if ((campo === 'venDtNasc' || campo === 'venCrachaData') && valor) {
                            try {
                                const data = new Date(valor);
                                if (!isNaN(data.getTime())) {
                                    valor = data.toISOString().split('T')[0];
                                }
                            } catch (e) {
                                console.warn('Erro ao formatar data:', e);
                            }
                        }
                        
                        if (input.tagName === 'SELECT') {
                            input.value = valor;
                        } else {
                            input.value = valor;
                        }
                    }
                });
                
                this.vendedorId = vendedor.idVendedor || vendedor.id || null;
                console.log('ID do vendedor armazenado:', this.vendedorId);
                
                this.syncWithFilament();
                this.atualizarStatusIndicador();
                this.atualizarEstadoBotoes();
                
                setTimeout(() => {
                    const statusElement = document.getElementById('status-indicator');
                    if (statusElement) {
                        statusElement.textContent = 'Vendedor Carregado';
                        statusElement.className = 'status-view status-ativo';
                    }
                }, 100);
            },
            
            desabilitarCampos() {
                const campos = [
                    'idVendedor', 'venNome', 'venCpf', 'venRg', 'venDtNasc', 'venCep', 'venSuspenso',
                    'venSusMotivo', 'venChave', 'venCelular', 'venNumCasa', 'venCompCasa', 'venInss',
                    'venPrefeitura', 'venAltura', 'venPeso', 'venSexo', 'venCalcado',
                    'venTorax', 'venCabeca', 'venCintura', 'venQuadril', 'venBusto', 'venPescoco',
                    'venCoxa', 'venStatus', 'venCracha', 'venCrachaLiberado', 'venCrachaData',
                    'venIdMaquineta', 'venEmail'
                ];
                
                campos.forEach(campo => {
                    const input = document.getElementById('custom-' + campo);
                    if (input) {
                        input.disabled = true;
                    }
                });
                
                const inputImagem = document.getElementById('custom-venImagem');
                if (inputImagem) {
                    inputImagem.disabled = true;
                }
            },
            
            habilitarCampos() {
                const campos = [
                    'venNome', 'venCpf', 'venRg', 'venDtNasc', 'venCep', 'venSuspenso',
                    'venSusMotivo', 'venChave', 'venCelular', 'venNumCasa', 'venCompCasa', 'venInss',
                    'venPrefeitura', 'venAltura', 'venPeso', 'venSexo', 'venCalcado',
                    'venTorax', 'venCabeca', 'venCintura', 'venQuadril', 'venBusto', 'venPescoco',
                    'venCoxa', 'venStatus', 'venCracha', 'venCrachaLiberado', 'venCrachaData',
                    'venIdMaquineta', 'venEmail'
                ];
                
                campos.forEach(campo => {
                    const input = document.getElementById('custom-' + campo);
                    if (input) {
                        input.disabled = false;
                    }
                });
                
                setTimeout(() => {
                    const primeiroCampo = document.getElementById('custom-venNome');
                    if (primeiroCampo) {
                        primeiroCampo.focus();
                    }
                }, 100);
            },
            
            atualizarEstadoBotoes() {
                setTimeout(() => {
                    const insertBtn = document.getElementById('custom-insert');
                    const updateBtn = document.getElementById('custom-update');
                    const deleteBtn = document.getElementById('custom-delete');
                    const searchBtn = document.querySelector('.action-btn[x-on\\:click*="vendedor-search-modal"]');
                    
                    if (insertBtn) insertBtn.disabled = this.editando;
                    if (updateBtn) updateBtn.disabled = !this.vendedorId || this.editando;
                    if (deleteBtn) deleteBtn.disabled = !this.vendedorId || this.editando;
                    if (searchBtn) searchBtn.disabled = this.editando;
                }, 50);
            },
            
            iniciarInserir() {
                console.log('=== INICIANDO MODO INSERÇÃO ===');
                
                this.limparCampos();
                this.limparErros();
                
                this.editando = true;
                this.mostrarSalvar = true;
                this.vendedorId = null;
                this.salvando = false;
                
                this.habilitarCampos();
                this.atualizarStatusIndicador();
                this.atualizarEstadoBotoes();
                
                const statusElement = document.getElementById('status-indicator');
                if (statusElement) {
                    statusElement.textContent = 'Modo Inserção';
                    statusElement.className = 'status-view status-ativo';
                }
            },
            
            iniciarAtualizar() {
                if (!this.vendedorId) {
                    this.mostrarErro(['Selecione um vendedor para atualizar']);
                    return;
                }
                
                console.log('=== INICIANDO MODO ATUALIZAÇÃO ===');
                
                this.editando = true;
                this.mostrarSalvar = true;
                this.salvando = false;
                this.limparErros();
                
                this.habilitarCampos();
                this.atualizarStatusIndicador();
                this.atualizarEstadoBotoes();

                const statusElement = document.getElementById('status-indicator');
                if (statusElement) {
                    statusElement.textContent = 'Modo Edição';
                    statusElement.className = 'status-view status-ativo';
                }
            },
            
            cancelarEdicao() {
                if (confirm('Tem certeza que deseja cancelar a edição? As alterações não salvas serão perdidas.')) {
                    this.editando = false;
                    this.mostrarSalvar = false;
                    this.salvando = false;
                    this.desabilitarCampos();
                    this.atualizarStatusIndicador();
                    this.limparErros();
                    this.atualizarEstadoBotoes();
                    
                    if (this.vendedorId) {
                        this.recarregarVendedorAtual();
                    }
                }
            },
            
            recarregarVendedorAtual() {
                console.log('Mantendo dados atuais após cancelar');
            },
            
            // MÉTODO SALVAR SIMPLIFICADO QUE USA O FORMULÁRIO DO FILAMENT
            async salvar() {
                console.log('=== TENTANDO SALVAR NO BANCO (Filament 4.x) ===');
                
                // Validação básica
                const nome = document.getElementById('custom-venNome').value;
                if (!nome || nome.trim() === '') {
                    this.mostrarErro(['O campo Nome é obrigatório']);
                    return;
                }
                
                this.salvando = true;
                this.limparErros();
                this.mostrarLoading(true);
                
                try {
                    // 1. Sincronizar dados com Livewire
                    await this.syncDataToLivewire();
                    
                    // 2. Encontrar e acionar o salvamento do Filament
                    const salvou = await this.triggerFilamentSave();
                    
                    if (salvou) {
                        // 3. Atualizar estado
                        this.editando = false;
                        this.salvando = false;
                        this.desabilitarCampos();
                        this.atualizarStatusIndicador();
                        this.atualizarEstadoBotoes();
                        
                        // 4. Mostrar sucesso
                        this.mostrarSucesso('Dados salvos com sucesso!');
                        
                        // 5. Se for inserção, obter novo ID
                        if (!this.vendedorId) {
                            await this.obterNovoId();
                        }
                    } else {
                        throw new Error('Não foi possível salvar os dados');
                    }
                    
                } catch (error) {
                    console.error('Erro ao salvar:', error);
                    this.mostrarErro([error.message || 'Erro ao processar salvamento']);
                    this.salvando = false;
                } finally {
                    this.mostrarLoading(false);
                }
            },

            async syncDataToLivewire() {
                console.log('Sincronizando dados com Livewire...');
                
                const dados = this.coletarDadosFormulario();
                
                // Encontrar componente Livewire do Filament
                const livewireComponent = await this.encontrarLivewireComponent();
                
                if (!livewireComponent) {
                    throw new Error('Componente Livewire não encontrado');
                }
                
                // Mapear e enviar dados
                const fieldMap = {
                    'idVendedor': 'idVendedor',
                    'venNome': 'venNome',
                    'venCpf': 'venCpf',
                    'venRg': 'venRg',
                    'venDtNasc': 'venDtNasc',
                    'venSexo': 'venSexo',
                    'venCalcado': 'venCalcado',
                    'venCelular': 'venCelular',
                    'venEmail': 'venEmail',
                    'venChave': 'venChave',
                    'venCep': 'venCep',
                    'venNumCasa': 'venNumCasa',
                    'venCompCasa': 'venCompCasa',
                    'venInss': 'venInss',
                    'venPrefeitura': 'venPrefeitura',
                    'venAltura': 'venAltura',
                    'venPeso': 'venPeso',
                    'venTorax': 'venTorax',
                    'venCabeca': 'venCabeca',
                    'venCintura': 'venCintura',
                    'venQuadril': 'venQuadril',
                    'venBusto': 'venBusto',
                    'venPescoco': 'venPescoco',
                    'venCoxa': 'venCoxa',
                    'venStatus': 'venStatus',
                    'venSuspenso': 'venSuspenso',
                    'venSusMotivo': 'venSusMotivo',
                    'venCracha': 'venCracha',
                    'venCrachaLiberado': 'venCrachaLiberado',
                    'venCrachaData': 'venCrachaData',
                    'venIdMaquineta': 'venIdMaquineta'
                };
                
                // Usar o método set do Livewire
                Object.keys(fieldMap).forEach(customField => {
                    const livewireField = fieldMap[customField];
                    const valor = dados[customField];
                    
                    console.log(`Setando ${livewireField} = ${valor}`);
                    
                    // Filament 4.x usa $wire.set()
                    if (livewireComponent.$wire) {
                        livewireComponent.$wire.set(livewireField, valor);
                    } else if (livewireComponent.set) {
                        livewireComponent.set(livewireField, valor);
                    }
                });
                
                // Dar tempo para o Livewire processar
                await new Promise(resolve => setTimeout(resolve, 300));
            },

            async encontrarLivewireComponent() {
                console.log('Buscando componente Livewire...');
                
                // Método 1: Usar window.Livewire.find()
                if (window.Livewire) {
                    // Tentar encontrar por ID
                    const wireElements = document.querySelectorAll('[wire\\:id]');
                    for (let element of wireElements) {
                        const wireId = element.getAttribute('wire:id');
                        if (wireId) {
                            const component = window.Livewire.find(wireId);
                            if (component) {
                                console.log('Componente Livewire encontrado via wire:id:', wireId);
                                return component;
                            }
                        }
                    }
                    
                    // Tentar o primeiro componente disponível
                    const components = window.Livewire.components?.componentsById;
                    if (components && Object.keys(components).length > 0) {
                        const firstId = Object.keys(components)[0];
                        const component = window.Livewire.find(firstId);
                        console.log('Componente Livewire encontrado (primeiro disponível):', firstId);
                        return component;
                    }
                }
                
                // Método 2: Buscar por formulário Filament
                const forms = document.querySelectorAll('form');
                for (let form of forms) {
                    if (form.hasAttribute('wire:submit')) {
                        const wireId = form.closest('[wire\\:id]')?.getAttribute('wire:id');
                        if (wireId && window.Livewire?.find) {
                            const component = window.Livewire.find(wireId);
                            if (component) {
                                console.log('Componente encontrado via formulário:', wireId);
                                return component;
                            }
                        }
                    }
                }
                
                console.warn('Nenhum componente Livewire encontrado');
                return null;
            },

            async triggerFilamentSave() {
                console.log('Acionando salvamento do Filament...');
                
                // Método 1: Clicar no botão de salvar do Filament
                const saveButton = await this.encontrarBotaoSalvarFilament4();
                if (saveButton) {
                    console.log('Clicando no botão de salvar:', saveButton);
                    saveButton.click();
                    
                    // Aguardar um pouco
                    await new Promise(resolve => setTimeout(resolve, 1000));
                    return true;
                }
                
                // Método 2: Disparar evento de submit no formulário
                const forms = document.querySelectorAll('form[wire\\:submit]');
                for (let form of forms) {
                    console.log('Disparando submit no formulário:', form);
                    
                    // Criar evento
                    const event = new Event('submit', { bubbles: true, cancelable: true });
                    form.dispatchEvent(event);
                    
                    await new Promise(resolve => setTimeout(resolve, 1000));
                    return true;
                }
                
                // Método 3: Chamar método save via Livewire
                const component = await this.encontrarLivewireComponent();
                if (component) {
                    try {
                        console.log('Chamando método save via Livewire');
                        
                        if (component.$wire && component.$wire.call) {
                            await component.$wire.call('save');
                            return true;
                        } else if (component.call) {
                            await component.call('save');
                            return true;
                        }
                    } catch (error) {
                        console.warn('Erro ao chamar save via Livewire:', error);
                    }
                }
                
                return false;
            },

            async encontrarBotaoSalvarFilament4() {
                // Buscar por botões de salvar do Filament 4.x
                const selectors = [
                    'button[type="submit"]',
                    'button.fi-btn-primary',
                    'button.fi-ac-action-primary',
                    '.fi-btn-primary',
                    '.fi-ac-action-primary'
                ];
                
                for (let selector of selectors) {
                    const buttons = document.querySelectorAll(selector);
                    for (let button of buttons) {
                        // Ignorar botões no nosso formulário customizado
                        if (!button.closest('.fornecedor-custom')) {
                            const text = button.textContent?.toLowerCase() || '';
                            if (text.includes('salvar') || text.includes('save') || 
                                selector.includes('primary') || selector.includes('submit')) {
                                return button;
                            }
                        }
                    }
                }
                
                // Busca por texto
                const allButtons = document.querySelectorAll('button:not(.fornecedor-custom button)');
                for (let button of allButtons) {
                    const text = button.textContent?.toLowerCase() || '';
                    if (text.includes('salvar') || text.includes('save')) {
                        return button;
                    }
                }
                
                return null;
            },

            encontrarAcaoSalvarFilament() {
                // Procurar por ações (actions) do Filament
                const actionAreas = document.querySelectorAll('.fi-ac, .filament-header-actions, .filament-form-actions');
                
                for (let area of actionAreas) {
                    const buttons = area.querySelectorAll('button');
                    for (let button of buttons) {
                        const text = button.textContent?.toLowerCase() || '';
                        if (text.includes('salvar') || text.includes('save')) {
                            return button;
                        }
                    }
                }
                
                return null;
            },

            async obterNovoIdAposInsercao() {
                // Após uma inserção, o Filament geralmente redireciona para a página de edição
                // Podemos tentar extrair o ID da URL ou dos campos ocultos
                
                await new Promise(resolve => setTimeout(resolve, 2000));
                
                // Tentar obter do campo idVendedor
                const idInput = document.getElementById('custom-idVendedor');
                if (idInput && idInput.value) {
                    this.vendedorId = idInput.value;
                    console.log('Novo ID obtido do campo:', this.vendedorId);
                    return;
                }
                
                // Tentar obter de campos ocultos do Filament
                const hiddenIdInputs = document.querySelectorAll('input[type="hidden"][name*="id"], input[type="hidden"][name*="Id"]');
                for (let input of hiddenIdInputs) {
                    if (input.value && !isNaN(input.value)) {
                        this.vendedorId = input.value;
                        console.log('Novo ID obtido de campo oculto:', this.vendedorId);
                        break;
                    }
                }
                
                // Tentar obter da URL (se redirecionou para edição)
                const url = window.location.href;
                const idMatch = url.match(/\/(\d+)\/edit$/);
                if (idMatch && idMatch[1]) {
                    this.vendedorId = idMatch[1];
                    console.log('Novo ID obtido da URL:', this.vendedorId);
                }
            },

            encontrarComponenteLivewire() {
                // Procurar por elementos com atributos wire: ou componentes Livewire
                const elementosLivewire = document.querySelectorAll('[wire\\:id], [wire\\:initial-data]');
                
                for (let elemento of elementosLivewire) {
                    const wireId = elemento.getAttribute('wire:id') || 
                                elemento.getAttribute('wire:initial-data')?.match(/"id":"([^"]+)"/)?.[1];
                    
                    if (wireId) {
                        // Acessar o componente Livewire via window.Livewire
                        if (window.Livewire && window.Livewire.find) {
                            const component = window.Livewire.find(wireId);
                            if (component) return component;
                        }
                    }
                }
                
                // Alternativa: procurar por formulários com wire:submit
                const forms = document.querySelectorAll('form[wire\\:submit]');
                if (forms.length > 0) {
                    const form = forms[0];
                    const wireId = form.closest('[wire\\:id]')?.getAttribute('wire:id');
                    if (wireId && window.Livewire?.find) {
                        return window.Livewire.find(wireId);
                    }
                }
                
                return null;
            },

            sincronizarComLivewire(component, dados) {
                // Mapear campos do nosso formulário para os campos do Livewire
                const fieldMap = {
                    'idVendedor': 'data.idVendedor',
                    'venNome': 'data.venNome',
                    'venCpf': 'data.venCpf',
                    'venRg': 'data.venRg',
                    'venDtNasc': 'data.venDtNasc',
                    'venSexo': 'data.venSexo',
                    'venCalcado': 'data.venCalcado',
                    'venCelular': 'data.venCelular',
                    'venEmail': 'data.venEmail',
                    'venChave': 'data.venChave',
                    'venCep': 'data.venCep',
                    'venNumCasa': 'data.venNumCasa',
                    'venCompCasa': 'data.venCompCasa',
                    'venAltura': 'data.venAltura',
                    'venPeso': 'data.venPeso',
                    'venTorax': 'data.venTorax',
                    'venCabeca': 'data.venCabeca',
                    'venCintura': 'data.venCintura',
                    'venQuadril': 'data.venQuadril',
                    'venBusto': 'data.venBusto',
                    'venPescoco': 'data.venPescoco',
                    'venCoxa': 'data.venCoxa',
                    'venInss': 'data.venInss',
                    'venPrefeitura': 'data.venPrefeitura',
                    'venCracha': 'data.venCracha',
                    'venCrachaLiberado': 'data.venCrachaLiberado',
                    'venCrachaData': 'data.venCrachaData',
                    'venStatus': 'data.venStatus',
                    'venSuspenso': 'data.venSuspenso',
                    'venIdMaquineta': 'data.venIdMaquineta',
                    'venSusMotivo': 'data.venSusMotivo'
                };
                
                // Sincronizar cada campo
                Object.keys(fieldMap).forEach(customField => {
                    const livewirePath = fieldMap[customField];
                    const value = dados[customField] || '';
                    
                    // Usar o método set do Livewire para atualizar o valor
                    if (component.set) {
                        try {
                            component.set(livewirePath, value);
                        } catch (e) {
                            console.warn(`Erro ao setar ${livewirePath}:`, e);
                        }
                    }
                });
            },

            async dispararSaveLivewire(component, operacao) {
                return new Promise((resolve, reject) => {
                    // Verificar se o componente tem método save
                    if (component.call && typeof component.call === 'function') {
                        component.call('save')
                            .then(() => resolve())
                            .catch((error) => reject(error));
                    } 
                    // Tentar método padrão do Filament
                    else if (component.$wire && component.$wire.save) {
                        component.$wire.save()
                            .then(() => resolve())
                            .catch((error) => reject(error));
                    }
                    // Procurar e clicar no botão de salvar real
                    else {
                        const saveButton = this.encontrarBotaoSalvarReal();
                        if (saveButton) {
                            saveButton.click();
                            setTimeout(() => resolve(), 1000); // Dar tempo para processar
                        } else {
                            reject(new Error('Não foi possível encontrar método de salvamento'));
                        }
                    }
                });
            },

            encontrarBotaoSalvarReal() {
                // Procurar botões do Filament
                const buttons = document.querySelectorAll('button');
                
                for (let button of buttons) {
                    const text = button.textContent?.toLowerCase() || '';
                    const classes = button.className || '';
                    
                    // Filament v3
                    if (text.includes('salvar') && classes.includes('fi-btn')) {
                        return button;
                    }
                    
                    // Filament v2
                    if (text.includes('salvar') && (classes.includes('primary') || button.getAttribute('wire:click') === 'save')) {
                        return button;
                    }
                }
                
                return null;
            },

            mostrarSucesso() {
                // Criar popup de sucesso
                const popup = document.createElement('div');
                popup.className = 'success-popup';
                popup.textContent = this.vendedorId ? 'Vendedor atualizado com sucesso!' : 'Vendedor criado com sucesso!';
                
                document.body.appendChild(popup);
                
                // Remover após 3 segundos
                setTimeout(() => {
                    if (popup.parentNode) {
                        popup.parentNode.removeChild(popup);
                    }
                }, 3000);
                
                // Atualizar status
                const statusElement = document.getElementById('status-indicator');
                if (statusElement) {
                    statusElement.textContent = 'Salvo com sucesso';
                    statusElement.className = 'status-view status-ativo';
                    
                    setTimeout(() => {
                        if (this.vendedorId) {
                            statusElement.textContent = 'Vendedor Carregado';
                        }
                    }, 2000);
                }
            },
            
            coletarDadosFormulario() {
                const campos = [
                    'idVendedor', 'venNome', 'venCpf', 'venRg', 'venDtNasc', 'venCep', 'venSuspenso',
                    'venSusMotivo', 'venChave', 'venCelular', 'venNumCasa', 'venCompCasa', 'venInss',
                    'venPrefeitura', 'venAltura', 'venPeso', 'venSexo', 'venCalcado',
                    'venTorax', 'venCabeca', 'venCintura', 'venQuadril', 'venBusto', 'venPescoco',
                    'venCoxa', 'venStatus', 'venCracha', 'venCrachaLiberado', 'venCrachaData',
                    'venIdMaquineta', 'venEmail'
                ];
                
                const dados = {};
                campos.forEach(campo => {
                    const input = document.getElementById(`custom-${campo}`);
                    if (input) {
                        let valor = input.value;
                        
                        // Converter valores
                        if (campo === 'venSuspenso') {
                            valor = valor === '1' || valor === 'true' ? 1 : 0;
                        }
                        
                        if (campo === 'venCrachaLiberado') {
                            valor = valor === 'S' ? 'S' : 'N';
                        }
                        
                        dados[campo] = valor;
                    }
                });
                
                return dados;
            },
            
            async usarBotaoSalvarFilament() {
                console.log('Tentando encontrar botão de salvar do Filament...');
                
                // Procurar botões de submit do Filament
                const botoesSalvar = document.querySelectorAll('button[type="submit"], button[wire\\:click*="save"], button.fi-btn');
                
                for (let botao of botoesSalvar) {
                    const texto = botao.textContent.toLowerCase();
                    if (texto.includes('salvar') || texto.includes('save') || 
                        botao.classList.contains('fi-btn-primary')) {
                        console.log('Botão de salvar encontrado:', botao);
                        
                        // Simular clique no botão
                        setTimeout(() => {
                            botao.click();
                        }, 100);
                        
                        return true;
                    }
                }
                
                console.log('Nenhum botão de salvar do Filament encontrado');
                return false;
            },
            
            async salvarComFormularioAlternativo(dados) {
                console.log('Usando método alternativo para salvar...');
                
                // Criar um formulário temporário
                const form = document.createElement('form');
                form.method = 'POST';
                form.style.display = 'none';
                
                // Usar a mesma ação do formulário atual (se existir)
                const formularioAtual = document.querySelector('form');
                if (formularioAtual && formularioAtual.action) {
                    form.action = formularioAtual.action;
                } else {
                    form.action = window.location.href;
                }
                
                // Adicionar token CSRF
                const csrfToken = this.obterCsrfToken();
                if (csrfToken) {
                    const tokenInput = document.createElement('input');
                    tokenInput.type = 'hidden';
                    tokenInput.name = '_token';
                    tokenInput.value = csrfToken;
                    form.appendChild(tokenInput);
                }
                
                // Adicionar método correto (PUT para update)
                if (this.vendedorId) {
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'PUT';
                    form.appendChild(methodInput);
                }
                
                // Adicionar todos os campos
                Object.keys(dados).forEach(key => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key;
                    input.value = dados[key];
                    form.appendChild(input);
                });
                
                // Adicionar ao documento e submeter
                document.body.appendChild(form);
                console.log('Submetendo formulário alternativo para:', form.action);
                
                // Submeter o formulário
                form.submit();
                
                // Limpar após 5 segundos
                setTimeout(() => {
                    this.salvando = false;
                    this.mostrarLoading(false);
                }, 5000);
            },
            
            obterCsrfToken() {
                const tokenMeta = document.querySelector('meta[name="csrf-token"]');
                if (tokenMeta) return tokenMeta.content;
                
                const tokenInput = document.querySelector('input[name="_token"]');
                if (tokenInput) return tokenInput.value;
                
                return null;
            },
            
            async excluirVendedor() {
                if (!this.vendedorId) {
                    this.mostrarErro(['Selecione um vendedor para excluir']);
                    return;
                }
                
                const nomeVendedor = document.getElementById('custom-venNome').value;
                
                if (!confirm(`Tem certeza que deseja excluir o vendedor "${nomeVendedor}"? Esta ação não pode ser desfeita.`)) {
                    return;
                }
                
                this.mostrarLoading(true);
                
                // Tentar encontrar botão de excluir do Filament
                const botoesExcluir = document.querySelectorAll('button.fi-btn-danger, button[wire\\:click*="delete"]');
                
                for (let botao of botoesExcluir) {
                    const texto = botao.textContent.toLowerCase();
                    if (texto.includes('excluir') || texto.includes('delete')) {
                        console.log('Botão de excluir encontrado:', botao);
                        
                        setTimeout(() => {
                            botao.click();
                        }, 100);
                        
                        setTimeout(() => {
                            this.mostrarLoading(false);
                            this.vendedorId = null;
                            this.limparCampos();
                            this.atualizarStatusIndicador();
                            this.atualizarEstadoBotoes();
                        }, 3000);
                        
                        return;
                    }
                }
                
                // Se não encontrou botão, usar método alternativo
                console.log('Nenhum botão de excluir encontrado, usando método alternativo');
                this.mostrarLoading(false);
                this.mostrarErro(['Funcionalidade de exclusão não disponível nesta tela']);
            },
            
            limparCampos() {
                const campos = [
                    'idVendedor', 'venNome', 'venCpf', 'venRg', 'venDtNasc', 'venCep', 'venSuspenso',
                    'venSusMotivo', 'venChave', 'venCelular', 'venNumCasa', 'venCompCasa', 'venInss',
                    'venPrefeitura', 'venAltura', 'venPeso', 'venSexo', 'venCalcado',
                    'venTorax', 'venCabeca', 'venCintura', 'venQuadril', 'venBusto', 'venPescoco',
                    'venCoxa', 'venStatus', 'venCracha', 'venCrachaLiberado', 'venCrachaData',
                    'venIdMaquineta', 'venEmail'
                ];
                
                campos.forEach(campo => {
                    const input = document.getElementById('custom-' + campo);
                    if (input) {
                        if (input.tagName === 'SELECT') {
                            input.selectedIndex = 0;
                        } else {
                            input.value = '';
                        }
                    }
                });
                
                const inputImagem = document.getElementById('custom-venImagem');
                if (inputImagem) {
                    inputImagem.value = '';
                }
            },
            
            atualizarStatusIndicador() {
                const statusElement = document.getElementById('status-indicator');
                if (statusElement) {
                    if (this.editando) {
                        statusElement.textContent = 'Modo Edição';
                        statusElement.className = 'status-view status-ativo';
                    } else if (this.vendedorId) {
                        statusElement.textContent = 'Vendedor Carregado';
                        statusElement.className = 'status-view status-ativo';
                    } else {
                        statusElement.textContent = 'Modo Visualização';
                        statusElement.className = 'status-view status-inativo';
                    }
                }
            },
            
            mostrarErro(mensagens) {
                const errorDiv = document.getElementById('error-message');
                const errorList = document.getElementById('error-list');
                
                if (errorDiv && errorList) {
                    errorList.innerHTML = '';
                    mensagens.forEach(msg => {
                        const li = document.createElement('li');
                        li.textContent = msg;
                        errorList.appendChild(li);
                    });
                    
                    errorDiv.classList.add('show');
                    
                    setTimeout(() => {
                        this.limparErros();
                    }, 10000);
                }
            },
            
            limparErros() {
                const errorDiv = document.getElementById('error-message');
                const errorList = document.getElementById('error-list');
                
                if (errorDiv && errorList) {
                    errorDiv.classList.remove('show');
                    errorList.innerHTML = '';
                }
            },
            
            mostrarLoading(mostrar) {
                const loader = document.getElementById('global-loader');
                if (loader) {
                    if (mostrar) {
                        loader.classList.add('show');
                    } else {
                        loader.classList.remove('show');
                    }
                }
            }
        };
    }
    </script>

</div>