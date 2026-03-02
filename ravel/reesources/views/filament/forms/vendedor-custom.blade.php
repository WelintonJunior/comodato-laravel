<div class="fornecedor-custom">

<style>
.fornecedor-custom { width:100%; font-family: Inter, system-ui; color:#0f172a; }
.fornecedor-card { background:#a5a5a5; padding:18px; border-radius:10px; box-shadow:0 10px 25px rgba(0,0,0,.08); }
.fornecedor-row { display:flex; gap:16px; }
.fornecedor-main { flex:1; }
.fornecedor-actions { width:220px; display:flex; flex-direction:column; gap:10px; }

.form-grid { display:grid; grid-template-columns:repeat(12,1fr); gap:12px; }

.col-12{grid-column:span 12}
.col-8{grid-column:span 8}
.col-6{grid-column:span 6}
.col-4{grid-column:span 4}
.col-3{grid-column:span 3}
.col-2{grid-column:span 2}

label { font-weight:600; font-size:.8rem; }
input, select, textarea {
  width:100%; padding:9px;
  border-radius:8px; border:1px solid #e5e7eb;
}

textarea { resize:none; }

.save {
  background:#203A63; color:#fff;
  padding:10px 14px; border-radius:8px;
  font-weight:700; border:none;
}

.action-btn {
  background:#203A63; color:#fff;
  padding:10px; border-radius:8px;
  font-weight:700; border:none; cursor:pointer;
}
.action-btn.danger {
  background:#fff5f5; color:#b91c1c;
  border:1px solid #fecaca;
}

input[type="hidden"][name^="ven"] { display:none !important; }
</style>

<div class="fornecedor-card">
<div class="fornecedor-row">

<div class="fornecedor-main">
<div class="form-grid">

{{-- DADOS PESSOAIS --}}
<div class="col-6"><label>Nome</label><input id="custom-venNome"></div>
<div class="col-3"><label>CPF</label><input id="custom-venCpf"></div>
<div class="col-3"><label>RG</label><input id="custom-venRg"></div>

<div class="col-3"><label>Sexo</label>
<select id="custom-venSexo">
<option value="0">Não informado</option>
<option value="1">Masculino</option>
<option value="2">Feminino</option>
</select></div>

<div class="col-3"><label>Estado Civil</label>
<select id="custom-venEstadoCivil">
<option value="0">Solteiro</option>
<option value="1">Casado</option>
<option value="2">Outro</option>
</select></div>

<div class="col-3"><label>Data Nasc.</label><input type="date" id="custom-venDtNasc"></div>
<div class="col-3"><label>Naturalidade</label><input id="custom-venNaturalidade"></div>

<div class="col-6"><label>Cônjuge</label><input id="custom-venConjuge"></div>
<div class="col-6"><label>Observações</label><textarea id="custom-venObservacoes"></textarea></div>

{{-- CONTATO --}}
<div class="col-4"><label>Celular</label><input id="custom-venCelular"></div>
<div class="col-4"><label>Email</label><input id="custom-venEmail"></div>

{{-- ENDEREÇO --}}
<div class="col-6"><label>Endereço</label><input id="custom-venEndereco"></div>
<div class="col-2"><label>Número</label><input id="custom-venNumero"></div>
<div class="col-4"><label>Bairro</label><input id="custom-venBairro"></div>
<div class="col-4"><label>Cidade</label><input id="custom-venCidade"></div>
<div class="col-2"><label>UF</label><input id="custom-venUf"></div>
<div class="col-3"><label>CEP</label><input id="custom-venCep"></div>
<div class="col-3"><label>Complemento</label><input id="custom-venComple"></div>

{{-- DOCUMENTOS --}}
<div class="col-3"><label>PIS</label><input id="custom-venPis"></div>
<div class="col-3"><label>INSS</label><input id="custom-venInss"></div>
<div class="col-3"><label>Prefeitura</label><input id="custom-venPrefeitura"></div>

{{-- BANCÁRIO --}}
<div class="col-4"><label>Banco</label><input id="custom-venBanco"></div>
<div class="col-4"><label>Agência</label><input id="custom-venAgencia"></div>
<div class="col-4"><label>Conta</label><input id="custom-venConta"></div>

{{-- SISTEMA --}}
<div class="col-3"><label>Status</label>
<select id="custom-venStatus">
<option value="0">Ativo</option>
<option value="1">Inativo</option>
</select></div>

<div class="col-3"><label>Vínculo</label>
<select id="custom-venVinculo">
<option value="0">CLT</option>
<option value="1">PJ</option>
</select></div>

<div class="col-3"><label>Tips</label>
<select id="custom-venTips">
<option value="0">Não</option>
<option value="1">Sim</option>
</select></div>

<div class="col-3"><label>Máquina</label><input id="custom-venMaq"></div>

<div class="col-12"><label>Motivo Suspensão</label><input id="custom-venSusMotivo"></div>

<div class="col-12">
<button type="button" id="custom-save" class="save">Salvar</button>
</div>

</div>
</div>

<div class="fornecedor-actions">
<button class="action-btn">Inserir</button>
<button class="action-btn">Editar</button>
<button class="action-btn danger">Excluir</button>
</div>

</div>
</div>

<script>
(function(){
const map = [
'venNome','venCpf','venRg','venSexo','venEstadoCivil','venDtNasc','venNaturalidade',
'venConjuge','venObservacoes','venCelular','venEmail','venEndereco','venNumero',
'venBairro','venCidade','venUf','venCep','venComple','venPis','venInss',
'venPrefeitura','venBanco','venAgencia','venConta','venStatus','venVinculo',
'venTips','venMaq','venSusMotivo'
];

document.getElementById('custom-save').onclick = () => {
map.forEach(f=>{
const c=document.getElementById('custom-'+f);
const h=document.querySelector(`input[name="${f}"]`);
if(c && h) h.value=c.value ?? '';
});
document.querySelector('form[method="POST"]')?.submit();
};
})();
</script>

</div>
