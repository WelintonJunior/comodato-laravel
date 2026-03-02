<x-filament::page>
  <div class="uc-page">
    <div class="uc-logo-wrap">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="uc-logo" />
    </div>

    <div class="uc-card" role="region" aria-labelledby="uc-title">
      <div class="uc-icon-wrap" aria-hidden="true">
        <svg xmlns="http://www.w3.org/2000/svg"
             viewBox="0 0 24 24"
             class="icon-under-dev"
             fill="none"
             stroke="currentColor"
             stroke-width="1.6"
             stroke-linecap="round"
             stroke-linejoin="round"
             width="24"
             height="24"
             role="img"
             aria-hidden="true">
          <circle cx="12" cy="12" r="9"></circle>
          <path d="M12 7v6l3 2"></path>
        </svg>
      </div>

      <h1 id="uc-title" class="uc-title">Em desenvolvimento</h1>

      <p class="uc-desc">
        Esta tela ainda está em desenvolvimento e pode apresentar problemas técnicos.
        Estamos trabalhando nela — volte mais tarde ou contate o responsável pelo sistema.
      </p>

      <div class="uc-actions">
        <a href="{{ route('filament.admin.pages.dashboard') }}" class="uc-btn-primary">
          Voltar ao Dashboard
        </a>

        <button type="button" onclick="location.reload()" class="uc-btn-secondary">
          Recarregar
        </button>
      </div>
    </div>
  </div>

  <style>
    /* Página */
    .uc-page {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 4rem 1rem;
    min-height: calc(100vh - 4rem);
    }

    /* Logo */
    .uc-logo-wrap { margin-bottom: 1rem; }
    .uc-logo {
    height: 64px;
    width: auto;
    object-fit: contain;
    display: block;
    filter: drop-shadow(0 10px 30px rgba(0,0,0,0.45));
    }

    /* Card central com leve blur e gradiente sutil */
    .uc-card {
    width: 100%;
    max-width: 720px;
    background: linear-gradient(180deg, rgba(255,255,255,0.03), rgba(255,255,255,0.02));
    border: 1px solid rgba(255,255,255,0.06);
    padding: 2rem;
    border-radius: 1rem;
    text-align: center;
    box-shadow: 0 18px 50px rgba(2,6,23,0.6);
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
    transform: translateY(0);
    transition: transform .28s cubic-bezier(.2,.9,.2,1), box-shadow .28s ease;
    }

    /* micro animação ao carregar */
    .uc-card:where(:not(:hover)) {
    animation: uc-entrance .45s ease both;
    }
    @keyframes uc-entrance {
    from { opacity: 0; transform: translateY(8px) scale(.995); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    /* Ícone: cor controlada pelo contêiner para garantir tom correto */
    .uc-icon-wrap {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 56px;
    height: 56px;
    margin: 0 auto 0.75rem;
    border-radius: 9999px;
    background: rgba(245,158,11,0.08);
    color: #f59e0b; /* controla stroke do svg */
    box-shadow: 0 8px 20px rgba(245,158,11,0.06) inset;
    }

    /* força o svg a usar currentColor e limita tamanho */
    .icon-under-dev {
    width: 24px !important;
    height: 24px !important;
    display: block !important;
    max-width: 100%;
    max-height: 100%;
    transform: none !important;
    }

    /* Título e descrição */
    .uc-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #ffffff;
    margin: 0.25rem 0 0.5rem;
    letter-spacing: -0.01em;
    }
    .uc-desc {
    color: #cbd5e1;
    font-size: 0.98rem;
    margin: 0 0 1.25rem;
    line-height: 1.6;
    max-width: 56ch;
    margin-left: auto;
    margin-right: auto;
    }

    /* Ações / botões */
    .uc-actions {
    display: flex;
    gap: 0.75rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 0.5rem;
    }

    /* Botões */
    .uc-btn-primary,
    .uc-btn-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.6rem 1.15rem;
    border-radius: 999px;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer;
    border: 1px solid rgba(255,255,255,0.06);
    transition: transform .12s ease, box-shadow .12s ease, opacity .12s ease;
    }

    /* Primário com leve gradiente e sombra */
    .uc-btn-primary {
    background: linear-gradient(180deg,#2b6ef6,#1e40af);
    color: #fff;
    box-shadow: 0 10px 30px rgba(30,64,175,0.28);
    }
    .uc-btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 18px 40px rgba(30,64,175,0.36);
    }

    /* Secundário mais discreto */
    .uc-btn-secondary {
    background: rgba(255,255,255,0.03);
    color: #e6eefc;
    }
    .uc-btn-secondary:hover {
    transform: translateY(-2px);
    opacity: 0.95;
    }

    /* Responsividade */
    @media (max-width: 640px) {
    .uc-card { padding: 1.25rem; margin: 0 0.5rem; }
    .uc-logo { height: 56px; }
    .uc-icon-wrap { width: 48px; height: 48px; }
    .uc-title { font-size: 1.25rem; }
    .uc-desc { font-size: 0.92rem; }
    .uc-btn-primary, .uc-btn-secondary { padding: 0.5rem .9rem; font-size: .95rem; }
    }

    </style>
</x-filament::page>
