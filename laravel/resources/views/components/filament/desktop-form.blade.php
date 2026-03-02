


<div class="desktop-container">
    @isset($tabs)
        <div class="desktop-tabs">{{ $tabs }}</div>
    @endisset

    <div class="desktop-body">
        <div class="desktop-form">{{ $form ?? '' }}</div>
        <div class="desktop-actions">{{ $actions ?? '' }}</div>
    </div>

    @isset($extra)
        <div class="desktop-extra">{{ $extra }}</div>
    @endisset
</div>

@once
<style>
/* Container geral */
.desktop-container {
    background: #0f172a; /* tom escuro como no exemplo */
    color: #e6eef8;
    padding: 18px;
    border-radius: 8px;
    box-shadow: 0 6px 18px rgba(2,6,23,0.45);
    font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
}

/* Layout principal */
.desktop-body {
    display: flex;
    gap: 18px;
    align-items: flex-start;
}
.desktop-form { flex: 1; }
.desktop-actions {
    width: 180px;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

/* Botões do painel lateral */
.desktop-actions .filament-button,
.desktop-actions button {
    border-radius: 10px;
    width: 100%;
    padding: 10px 12px;
    background: linear-gradient(180deg,#1f2937,#111827);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.06);
}

/* Linhas e campos do layout */
.row { display:flex; gap:14px; margin-bottom:14px; align-items:flex-start; }
.field { flex:1; min-width:0; }

/* tamanhos específicos */
.field.small { flex:0 0 140px; }
.field.large { flex:2; }

/* Toggle alinhado verticalmente */
.field.toggle { display:flex; align-items:center; gap:8px; }

/* ===== Ajustes para wrappers do Filament =====
   Força inputs/labels do Filament a ocupar 100% do espaço do .field
*/
.field .filament-forms-field-wrapper,
.field .filament-forms-field-group,
.field .filament-forms-field {
    width: 100%;
    display: block;
}

/* Label */
.field .filament-forms-field-wrapper > label,
.field .filament-forms-field-wrapper .filament-forms-field > label {
    color: #cbd5e1;
    font-size: 0.875rem;
    margin-bottom: 6px;
    display: block;
}

/* Input / Select / Textarea */
.field .filament-forms-field-wrapper input,
.field .filament-forms-field-wrapper select,
.field .filament-forms-field-wrapper textarea,
.field .filament-forms-field input,
.field .filament-forms-field select,
.field .filament-forms-field textarea {
    width: 100%;
    background: #0b1220;
    color: #e6eef8;
    border: 1px solid rgba(255,255,255,0.06);
    padding: 8px 10px;
    border-radius: 6px;
    box-sizing: border-box;
}

/* Toggle (switch) */
.field .filament-forms-field-wrapper .filament-forms-toggle,
.field .filament-forms-field .filament-forms-toggle {
    display: inline-flex;
    align-items: center;
}

/* Pequeno espaçamento entre linhas */
.desktop-form .row + .row { margin-top: 6px; }

/* Mensagem de fallback */
.alert {
    background: rgba(255,255,255,0.04);
    color: #f8fafc;
    padding: 10px;
    border-radius: 6px;
}

/* Responsividade */
@media (max-width: 900px) {
    .desktop-body { flex-direction: column; }
    .desktop-actions { width: 100%; order: 2; }
}
</style>
@endonce
