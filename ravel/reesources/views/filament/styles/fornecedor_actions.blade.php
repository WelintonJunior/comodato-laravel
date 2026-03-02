<div class="fornecedor-actions" style="display:flex;flex-direction:column;gap:8px;">
    <a href="#" class="action-btn">Pesquisar</a>
    <a href="#" class="action-btn primary">Inserir</a>
    <a href="#" class="action-btn">Editar</a>
    <a href="#" class="action-btn danger">Deletar</a>
    <a href="#" class="action-btn">Sair</a>

    <style>
        .fornecedor-actions { align-items: stretch; }
        .fornecedor-actions .action-btn {
            display:inline-flex;
            align-items:center;
            justify-content:center;
            padding:8px 10px;
            border-radius:6px;
            font-weight:600;
            cursor:pointer;
            border:1px solid rgba(15,23,42,0.06);
            background:#f3f4f6;
            color:#0f172a;
            text-decoration:none;
        }
        .fornecedor-actions .action-btn.primary {
            background:#203A63;
            color:#fff;
            border:none;
        }
        .fornecedor-actions .action-btn.danger {
            background:#fff5f5;
            color:#b91c1c;
            border:1px solid #fecaca;
        }

        @media (max-width:900px) {
            .fornecedor-actions { flex-direction:row; flex-wrap:wrap; gap:8px; }
            .fornecedor-actions .action-btn { flex:1 1 calc(50% - 8px); }
        }
    </style>
</div>
