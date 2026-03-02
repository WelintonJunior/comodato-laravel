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
            <strong>Usuário:</strong> {{ $user }}
        </div>

        <div class="footer-block">
            <strong>IP:</strong> {{ $ip }}
        </div>

        <div class="footer-block">
            <strong>Empresa:</strong> {{ $razaoSocial }} <br>
            <strong>CNPJ:</strong> {{ $cnpj }}
        </div>

        <div class="footer-block">
            {{ $endereco }} <br>
            {{ $cidade }}
        </div>

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

