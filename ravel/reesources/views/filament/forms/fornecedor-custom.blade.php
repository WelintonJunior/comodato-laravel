<div class="fornecedor-custom" x-data="{ showList: false }">

  {{-- ================== ESTILOS (pode extrair depois) ================== --}}
  <style>
    .fornecedor-custom { width:100%; box-sizing:border-box; font-family: Inter, ui-sans-serif, system-ui; color:#0f172a; }

    .fornecedor-card {
      background:#a5a5a5;
      padding:18px;
      border-radius:8px;
      box-shadow:0 8px 24px rgba(16,24,40,0.06);
    }

    .fornecedor-row { display:flex; gap:16px; }
    .fornecedor-main { flex:1; }
    .fornecedor-actions { width:220px; display:flex; flex-direction:column; gap:10px; }

    .form-grid { display:grid; grid-template-columns:repeat(12,1fr); gap:12px; }

    .col-12{grid-column:span 12}
    .col-10{grid-column:span 10}
    .col-8{grid-column:span 8}
    .col-6{grid-column:span 6}
    .col-4{grid-column:span 4}
    .col-2{grid-column:span 2}

    label { font-weight:600; font-size:.9rem; }
    input, select {
      width:100%; padding:10px; border-radius:8px;
      border:1px solid #e6edf3;
    }

    .action-btn {
      padding:10px;
      border-radius:8px;
      background:#203A63;
      color:#fff;
      text-align:center;
      font-weight:700;
      text-decoration:none;
      cursor:pointer;
    }

    .action-btn.danger {
      background:#fff5f5;
      color:#b91c1c;
      border:1px solid #fecaca;
    }

    .save {
      background:#203A63;
      color:#fff;
      padding:10px 14px;
      border-radius:8px;
      font-weight:700;
    }

    input[type="hidden"][name^="for"] { display:none !important; }
  </style>

  {{-- ================== CARD PRINCIPAL ================== --}}
  <div class="fornecedor-card">
    <div class="fornecedor-row">

      {{-- FORM VISUAL --}}
      <div class="fornecedor-main">
        <div class="form-grid">

          <div class="col-2">
            <label>ID</label>
            <input id="custom-forId" readonly>
          </div>

          <div class="col-10">
            <label>Razão Social</label>
            <input id="custom-forRazSocial">
          </div>

          <div class="col-4"><label>I.E.</label><input id="custom-forIe"></div>
          <div class="col-4"><label>CNPJ</label><input id="custom-forCnpj"></div>
          <div class="col-4"><label>Telefone</label><input id="custom-forTelefone"></div>

          <div class="col-4"><label>Contato</label><input id="custom-forContato"></div>
          <div class="col-4"><label>Celular</label><input id="custom-forCelular"></div>
          <div class="col-4"><label>CEP</label><input id="custom-forCep"></div>

          <div class="col-8"><label>Endereço</label><input id="custom-forEndereco"></div>
          <div class="col-2"><label>Número</label><input id="custom-forNumero"></div>
          <div class="col-2"><label>Bairro</label><input id="custom-forBairro"></div>

          <div class="col-4"><label>Compl.</label><input id="custom-forCompl"></div>
          <div class="col-6"><label>Cidade</label><input id="custom-forCidade"></div>
          <div class="col-2"><label>Estado</label><input id="custom-forEstado"></div>

          <div class="col-2">
            <label>Suspenso</label>
            <select id="custom-forSuspenso">
              <option value="0">Não</option>
              <option value="1">Sim</option>
            </select>
          </div>

          <div class="col-10"><label>Motivo</label><input id="custom-forSusMotivo"></div>

          <div class="col-12">
            <button type="button" id="custom-save" class="save">Salvar</button>
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

        <a class="action-btn">Inserir</a>
        <a class="action-btn">Editar</a>
        <a class="action-btn danger">Deletar</a>
      </div>

    </div>
  </div>

  {{-- ================== CARD DA LISTA ================== --}}
<x-filament::modal
    id="fornecedor-search-modal"
    width="4xl"
>
    <livewire:fornecedor-search-table />
</x-filament::modal>



  {{-- ================== JS DE SINCRONIZAÇÃO ================== --}}
  <script>
    (function () {
      const map = [
        ['custom-forId','forId'],
        ['custom-forRazSocial','forRazSocial'],
        ['custom-forIe','forIe'],
        ['custom-forCnpj','forCnpj'],
        ['custom-forTelefone','forTelefone'],
        ['custom-forContato','forContato'],
        ['custom-forCelular','forCelular'],
        ['custom-forCep','forCep'],
        ['custom-forEndereco','forEndereco'],
        ['custom-forNumero','forNumero'],
        ['custom-forBairro','forBairro'],
        ['custom-forCompl','forCompl'],
        ['custom-forCidade','forCidade'],
        ['custom-forEstado','forEstado'],
        ['custom-forSuspenso','forSuspenso'],
        ['custom-forSusMotivo','forSusMotivo'],
      ];

      function syncToHidden() {
        map.forEach(([c,h]) => {
          const custom = document.getElementById(c);
          const hidden = document.querySelector(`input[name="${h}"]`);
          if (custom && hidden) hidden.value = custom.value ?? '';
        });
      }

      document.getElementById('custom-save').addEventListener('click', () => {
        syncToHidden();
        document.querySelector('form[method="POST"]')?.submit();
      });

      document.addEventListener('livewire:init', () => {
        Livewire.on('fornecedor-selected', data => {
          document.getElementById('custom-forId').value = data.id;
          document.getElementById('custom-forRazSocial').value = data.razao;
        });
      });
    })();
  </script>

</div>
