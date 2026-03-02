<style>
    .filament-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        min-height: 60px;

        background-color: #ffffff;
        border-top: 1px solid #e5e7eb;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);

        display: flex;
        justify-content: space-between;
        align-items: center;

        padding: 6px 16px;
        font-size: 12px;
        color: #374151;

        z-index: 9999;
    }

    .footer-left {
        display: flex;
        align-items: center;
        gap: 18px;
        flex-wrap: wrap;
        max-width: 80%;
    }

    .footer-block {
        line-height: 1.2;
        white-space: nowrap;
    }

    .footer-right {
        display: flex;
        align-items: center;
        gap: 8px;
        white-space: nowrap;
    }

    .footer-logo {
        height: 26px;
        width: auto;
    }
</style>

<footer class="filament-footer">
    <div class="footer-left">
        <div class="footer-block">
            <strong>Usuario:</strong> {{ auth()->user()->name ?? 'N/A' }}
        </div>

        <div class="footer-block">
            <strong>IP:</strong> {{ request()->ip() }}
        </div>

        @php
            use App\Models\Nucleo;
            $nucleo = Nucleo::find(1);
            
            function formatarCNPJ($cnpj) {
                if (empty($cnpj)) return 'N/A';
                $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
                if (strlen($cnpj) === 14) {
                    return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cnpj);
                }
                return $cnpj;
            }
            
            function formatarCEP($cep) {
                if (empty($cep)) return 'N/A';
                $cep = preg_replace('/[^0-9]/', '', $cep);
                if (strlen($cep) === 8) {
                    return preg_replace('/(\d{5})(\d{3})/', '$1-$2', $cep);
                }
                return $cep;
            }
        @endphp

        @if($nucleo)
            <div class="footer-block">
                <strong>Empresa:</strong> {{ $nucleo->nucRazaoSocial }} <br>
                <strong>CNPJ:</strong> {{ formatarCNPJ($nucleo->nucCNPJ) }}
            </div>

            <div class="footer-block">
                {{ $nucleo->nucEndereco }}, {{ $nucleo->nucNumero }} <br>
                CEP: {{ formatarCEP($nucleo->nucCep) }}
            </div>
            
            @if($nucleo->nucTelefone)
            <div class="footer-block">
                <strong>Telefone:</strong> {{ $nucleo->nucTelefone }} <br>
                <strong>Email:</strong> {{ $nucleo->nucEmail }}
            </div>
            @endif
        @else
            <div class="footer-block">
                <strong>Empresa:</strong> Nao configurada <br>
                <strong>CNPJ:</strong> N/A
            </div>
        @endif

        <div class="footer-block" id="footer-datetime">
            --/--/---- --:--:--
        </div>

    </div>

    <div class="footer-right">
        <span>Raccoons Software</span>
        <img src="{{ asset('images/racconLogo.jpg') }}" class="footer-logo" alt="Logo">
    </div>
</footer>

<script>
    function atualizarDataHora() {
        const agora = new Date();

        const data = agora.toLocaleDateString('pt-BR');
        const hora = agora.toLocaleTimeString('pt-BR');

        const el = document.getElementById('footer-datetime');
        if (el) {
            el.innerHTML = `<strong>Data/Hora:</strong> ${data} ${hora}`;
        }
    }

    atualizarDataHora();
    setInterval(atualizarDataHora, 1000);
</script>