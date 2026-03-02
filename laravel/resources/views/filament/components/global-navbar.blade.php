<div class="topbar-root">
  <div class="topbar-bg">
    <div class="topbar-inner" x-data="{ open: false }">
      <div class="nav-group">
        <div class="relative">
          <button @click="open = !open" class="main-btn">Arquivos</button>

          <div
            x-show="open"
            x-transition
            @click.outside="open = false"
            class="submenu absolute"
            style="white-space:nowrap;"
          >

            <!-- Resource existente: Vendedores -->
            <a href="{{ route('filament.admin.resources.vendedors.index') }}"
                class="main-btn {{ request()->routeIs('filament.admin.resources.vendedors.*') ? 'active' : '' }}">
                Vendedores
            </a>

            <!-- Resource existente: Produtos -->
            <a href="{{ route('filament.admin.resources.produtos.index') }}"
                class="main-btn {{ request()->routeIs('filament.admin.resources.produtos.*') ? 'active' : '' }}">
                Produtos
            </a>

            <!-- Resource existente: PDV -->
            <a href="{{ route('filament.admin.resources.pdvs.index') }}"
                class="main-btn {{ request()->routeIs('filament.admin.resources.pdvs.*') ? 'active' : '' }}">
                PDV
            </a>

            <!-- Resource existente: Fornecedors -->
            <a href="{{ route('filament.admin.resources.fornecedors.index') }}"
                class="main-btn {{ request()->routeIs('filament.admin.resources.fornecedors.*') ? 'active' : '' }}">
                Fornecedor
            </a>
              <a href="{{ route('filament.admin.resources.entradas.index') }}" class="main-btn"
              class="main-btn {{ request()->routeIs('filament.admin.resources.entradas.*') ? 'active' : '' }}">
              Entradas
            </a>
            <a href="{{ route('filament.admin.pages.under-construction') }}" class="main-btn">Maquineta</a>
          </div>
        </div>

        <a href="{{ route('filament.admin.pages.dashboard') }}" class="main-btn">Dashboard</a>
        <a href="{{ route('filament.admin.pages.under-construction') }}"
            class="main-btn {{ request()->routeIs('filament.admin.pages.under-construction') ? 'active' : '' }}">
            Relatório
        </a>
        <a href="{{ route('filament.admin.pages.under-construction') }}" 
            class="main-btn">
            Sorteio
        </a>
        <form
            method="POST"
            action="{{ route('filament.admin.auth.logout') }}"
            class="logout-form"
          >
            @csrf

            <button type="submit" class="main-btn logout-btn">
              Sair
            </button>
        </form>


      </div>
    </div>
  </div>
</div>

<style>

/* botão logout com destaque */
.logout-btn {
  background: linear-gradient(to bottom, #ef4444, #b91c1c) !important;
}

/* container do logout separado do grupo central */
.logout-form {
  position: absolute;
  right: 1.5rem;
}



/* wrapper geral */
.topbar-root { width:100%; ; padding:1.5rem 0; }

/* faixa interna centralizada e com largura automática do conteúdo */
.topbar-bg { max-width: 100%; display:flex; justify-content:center; }

/* inner: garante centralização absoluta do grupo de botões */
.topbar-inner { width:100%; display:flex; justify-content:center; }

/* grupo de botões: força linha única e centralização */
.nav-group {
  display:flex;
  align-items:center;
  justify-content:center;
  gap:1rem;
  white-space:nowrap;
  padding:0 1rem;
  box-sizing:border-box;
}

/* botões principais: especificidade maior para sobrescrever regras globais */
.topbar-root .main-btn {
  display:inline-flex !important;
  align-items:center !important;
  justify-content:center !important;
  vertical-align:middle !important;
  padding:.5rem 1.6rem !important;
  border-radius:9999px !important;
  font-weight:600 !important;
  color:#fff !important;
  background:linear-gradient(to bottom,#3b82f6,#1d4ed8) !important;
  box-shadow:0 4px 6px rgba(0,0,0,.45) !important;
  line-height:1 !important;
  margin:0 !important;
  transform:none !important;
  transition:transform .15s ease !important;
  white-space:nowrap !important;
}

/* evita que um botão mude de linha quando o submenu abre */
.topbar-root .relative { position:relative; }

/* submenu: posicionado sem afetar o fluxo */
.topbar-root .submenu {
  position:absolute;
  left:0;
  top:100%;
  margin-top:.5rem;
  display:flex;
  gap:.5rem;
  background:#1f3a63;
  padding:.5rem .75rem;
  border-radius:9999px;
  box-shadow:0 8px 20px rgba(0,0,0,.45);
  z-index:9999;
}

/* botões do submenu */
.topbar-root .submenu-btn {
  display:inline-flex;
  align-items:center;
  justify-content:center;
  padding:.45rem 1.3rem;
  border-radius:9999px;
  font-size:.85rem;
  color:#fff;
  background:linear-gradient(to bottom,#4f7cc9,#345fa8);
  white-space:nowrap;
  transition:transform .15s ease;
}

/* hover states */
.topbar-root .main-btn:hover,
.topbar-root .submenu-btn:hover { transform:scale(1.05); }

/* responsividade: em telas muito pequenas, permitir wrap controlado */
@media (max-width:520px) {
  .nav-group { gap:.5rem; padding:0 .5rem; }
  .topbar-root .main-btn { padding:.45rem 1rem; font-size:.9rem; }
}

</style>
