<div class="fornecedor-page">
    <style>
        /* Container geral */
        .fornecedor-section {
            background: #ffffff;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(16,24,40,0.06);
            display: flex;
            gap: 1rem;
            align-items: flex-start;
        }

        /* Coluna principal (form) e coluna lateral (ações) */
        #fornecedor-wrapper .filament-forms-grid {
            flex: 1 1 auto;
        }

        .fornecedor-actions {
            width: 160px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: stretch;
            margin-left: 8px;
        }

        .fornecedor-actions .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 10px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            border: 1px solid rgba(15,23,42,0.06);
            background: #f3f4f6;
            color: #0f172a;
            text-decoration: none;
        }

        .fornecedor-actions .action-btn.primary {
            background: #203A63;
            color: #fff;
            border: none;
        }

        .fornecedor-actions .action-btn.danger {
            background: #fff5f5;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        /* Ajustes de campos para visual mais "desktop" */
        .fornecedor-section .filament-forms-field-wrapper label {
            color: #0f172a;
            font-weight: 600;
            margin-bottom: 0.25rem;
            display: block;
        }

        .fornecedor-section .filament-forms-field-wrapper input,
        .fornecedor-section .filament-forms-field-wrapper textarea,
        .fornecedor-section .filament-forms-field-wrapper select {
            background: #ffffff;
            border: 1px solid #e6edf3;
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
            box-shadow: none;
        }

        /* Toggle */
        .fornecedor-section .filament-forms-field-wrapper .filament-toggle {
            padding-top: 0.25rem;
        }

        /* Responsividade: empilha ações abaixo em telas pequenas */
        @media (max-width: 900px) {
            .fornecedor-section {
                flex-direction: column;
            }
            .fornecedor-actions {
                width: 100%;
                flex-direction: row;
                flex-wrap: wrap;
                gap: 8px;
            }
            .fornecedor-actions .action-btn {
                flex: 1 1 calc(50% - 8px);
            }
        }
    </style>

    <div class="fornecedor-section">
        <div id="fornecedor-wrapper" class="filament-forms-grid">
            <span>aaaaaaaaaaaaaaaaaaaa</span>
            <span>bbbbbbbbbbbbbbbbbbbbbb</span>
        </div>
    </div>
</div>
