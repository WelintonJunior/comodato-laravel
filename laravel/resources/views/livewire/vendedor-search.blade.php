<div class="vendedor-search-container space-y-4">

    <style>
        .vendedor-search-container {
            font-family: Inter, system-ui;
            color: #0f172a;
        }
        
        .search-container {
            display: flex;
            gap: 8px;
            margin-bottom: 12px;
        }
        
        .search-input {
            flex: 1;
            padding: 10px 16px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            font-size: 14px;
            transition: all 0.2s;
            background: #f9fafb;
        }
        
        .search-input:focus {
            outline: none;
            border-color: #203A63;
            box-shadow: 0 0 0 3px rgba(32, 58, 99, 0.1);
            background: white;
        }
        
        .search-btn {
            padding: 10px 20px;
            background: #203A63;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
            min-width: 100px;
        }
        
        .search-btn:hover {
            background: #162a4a;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(32, 58, 99, 0.2);
        }
        
        .search-btn:active {
            transform: translateY(0);
        }
        
        .search-btn:disabled {
            background: #94a3b8;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }
        
        .clear-btn {
            padding: 10px 16px;
            background: #f1f5f9;
            color: #64748b;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
        }
        
        .clear-btn:hover {
            background: #e2e8f0;
            color: #475569;
        }
        
        .vendedor-list {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: white;
        }
        
        .vendedor-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 16px;
            border-bottom: 1px solid #f3f4f6;
            transition: background 0.2s;
            cursor: pointer;
        }
        
        .vendedor-item:hover {
            background: #f8fafc;
        }
        
        .vendedor-item:last-child {
            border-bottom: none;
        }
        
        .vendedor-info {
            flex: 1;
            min-width: 0;
        }
        
        .vendedor-name {
            font-weight: 600;
            font-size: 14px;
            color: #1e293b;
            margin-bottom: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        
        .vendedor-details {
            display: flex;
            gap: 12px;
            font-size: 12px;
            color: #64748b;
        }
        
        .vendedor-detail {
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .select-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6px 12px;
            background: #203A63;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
            margin-left: 12px;
        }
        
        .select-btn:hover {
            background: #162a4a;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(32, 58, 99, 0.2);
        }
        
        .select-btn:active {
            transform: translateY(0);
        }
        
        .empty-state {
            padding: 40px 20px;
            text-align: center;
            color: #94a3b8;
        }
        
        .empty-icon {
            font-size: 32px;
            margin-bottom: 8px;
            color: #cbd5e1;
        }
        
        .empty-text {
            font-size: 14px;
            margin-bottom: 4px;
        }
        
        .empty-subtext {
            font-size: 12px;
            color: #94a3b8;
        }
        
        /* Scrollbar personalizada */
        .vendedor-list::-webkit-scrollbar {
            width: 6px;
        }
        
        .vendedor-list::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 3px;
        }
        
        .vendedor-list::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        
        .vendedor-list::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        /* Indicador de carregamento durante busca */
        .search-loading {
            position: relative;
        }
        
        .search-loading::after {
            content: '';
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            border: 2px solid #e5e7eb;
            border-top-color: #203A63;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        
        @keyframes spin {
            to { transform: translateY(-50%) rotate(360deg); }
        }
        
        /* Mensagem de digite para buscar */
        .search-hint {
            font-size: 12px;
            color: #94a3b8;
            text-align: center;
            padding: 8px;
            background: #f8fafc;
            border-radius: 6px;
            margin-top: 8px;
            display: none;
        }
        
        .search-hint.show {
            display: block;
        }
        
        /* Estado inicial */
        .initial-state {
            padding: 30px 20px;
            text-align: center;
            color: #94a3b8;
            background: #f8fafc;
            border-radius: 8px;
            border: 1px dashed #cbd5e1;
        }
        
        .initial-icon {
            font-size: 28px;
            margin-bottom: 8px;
            color: #cbd5e1;
        }
        
        .initial-text {
            font-size: 14px;
            margin-bottom: 4px;
            color: #64748b;
        }
    </style>

    <!-- Container de busca -->
    <div class="search-container">
        <input
            type="text"
            wire:model="search"
            placeholder="Digite o nome do vendedor..."
            class="search-input"
            id="search-input"
            wire:keydown.enter.prevent="performSearch"
        />
        <button
            type="button"
            class="search-btn"
            wire:click="performSearch"
            wire:loading.attr="disabled"
            wire:target="performSearch"
        >
            <span wire:loading.remove wire:target="performSearch">Pesquisar</span>
            <span wire:loading wire:target="performSearch">Buscando...</span>
        </button>
        <button
            type="button"
            class="clear-btn"
            wire:click="clearSearch"
        >
            Limpar
        </button>
    </div>
    
    <!-- Mensagem de dica -->
    <div class="search-hint" id="search-hint">
        Digite o nome e clique em "Pesquisar" ou pressione Enter
    </div>

    <!-- Lista de vendedores -->
    <div class="vendedor-list">
        @if(count($vendedores) > 0)
            @foreach($vendedores as $v)
                <div 
                    class="vendedor-item"
                    x-data="{hover: false}"
                    @mouseenter="hover = true"
                    @mouseleave="hover = false"
                >
                    <!-- Informações do vendedor -->
                    <div 
                        class="vendedor-info"
                        wire:click="selectVendedor({{ $v->getKey() }})"
                    >
                        <div class="vendedor-name">
                            {{ $v->venNome }}
                        </div>
                        <div class="vendedor-details">
                            @if($v->venCpf)
                                <span class="vendedor-detail cpf-field" data-cpf="{{ $v->venCpf }}">
                                    CPF: {{ $v->venCpf }}
                                </span>
                            @endif
                            
                            @if($v->venCelular)
                                <span class="vendedor-detail">
                                    {{ $v->venCelular }}
                                </span>
                            @endif
                            
                            @if($v->venStatus == 0)
                                <span class="vendedor-detail" style="color: #10b981;">
                                    Ativo
                                </span>
                            @else
                                <span class="vendedor-detail" style="color: #ef4444;">
                                    Inativo
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Botão de selecionar -->
                    <button
                        class="select-btn"
                        wire:click="selectVendedor({{ $v->getKey() }})"
                        x-show="hover || $search"
                        x-transition
                        title="Selecionar este vendedor"
                    >
                        Selecionar
                    </button>
                </div>
            @endforeach
        @else
            @if($performedSearch || strlen($search) > 0)
                <!-- Estado quando pesquisa não retorna resultados -->
                <div class="empty-state">
                    <div class="empty-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="empty-text">
                        @if($search)
                            Nenhum vendedor encontrado para "{{ $search }}"
                        @else
                            Nenhum vendedor encontrado na busca geral
                        @endif
                    </div>
                    <div class="empty-subtext">
                        @if($search)
                            Tente buscar por outro nome
                        @else
                            Não há vendedores cadastrados ou a busca não retornou resultados
                        @endif
                    </div>
                </div>
            @else
                <!-- Estado inicial (antes de pesquisar) -->
                <div class="initial-state">
                    <div class="initial-text">
                        Digite um nome para buscar vendedores
                    </div>
                    <div class="empty-subtext">
                        Clique em "Pesquisar" sem digitar nada para ver todos os vendedores
                    </div>
                </div>
            @endif
        @endif
    </div>

    <!-- Contador de resultados -->
    @if(count($vendedores) > 0)
        <div class="text-xs text-gray-500 text-center pt-2 border-t">
            {{ count($vendedores) }} vendedor(es) encontrado(s)
            @if(strlen($search) > 0)
                para "{{ $search }}"
            @endif
        </div>
    @endif

    <script>
        // Função para formatar CPF
        function formatCpf(cpf) {
            if (!cpf) return '';
            
            // Remove caracteres não numéricos
            cpf = cpf.replace(/\D/g, '');
            
            // Verifica se tem 11 dígitos
            if (cpf.length !== 11) return cpf;
            
            // Formata: 000.000.000-00
            return cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        }
        
        // Função para formatar telefone
        function formatPhone(phone) {
            if (!phone) return '';
            
            // Remove caracteres não numéricos
            phone = phone.replace(/\D/g, '');
            
            // Verifica o tamanho
            if (phone.length === 11) {
                // Formato: (00) 00000-0000
                return phone.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
            } else if (phone.length === 10) {
                // Formato: (00) 0000-0000
                return phone.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
            }
            
            return phone;
        }
        
        // Mostra/oculta a dica de pesquisa
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');
            const searchHint = document.getElementById('search-hint');
            
            if (searchInput && searchHint) {
                searchInput.addEventListener('focus', function() {
                    searchHint.classList.add('show');
                });
                
                searchInput.addEventListener('blur', function() {
                    setTimeout(() => {
                        searchHint.classList.remove('show');
                    }, 200);
                });
            }
            
            // Formata CPFs
            document.querySelectorAll('.cpf-field').forEach(element => {
                const text = element.textContent;
                if (text.includes('CPF:')) {
                    const parts = text.split('CPF: ');
                    if (parts[1]) {
                        const formatted = formatCpf(parts[1].trim());
                        if (formatted) {
                            element.textContent = 'CPF: ' + formatted;
                        }
                    }
                }
            });
        });
        
        // Aplica formatação quando o Livewire atualiza o DOM
        document.addEventListener('livewire:load', function() {
            Livewire.hook('message.processed', (message, component) => {
                setTimeout(() => {
                    document.querySelectorAll('.cpf-field').forEach(element => {
                        const text = element.textContent;
                        if (text.includes('CPF:')) {
                            const parts = text.split('CPF: ');
                            if (parts[1]) {
                                const formatted = formatCpf(parts[1].trim());
                                if (formatted) {
                                    element.textContent = 'CPF: ' + formatted;
                                }
                            }
                        }
                    });
                }, 100);
            });
        });
    </script>

</div>