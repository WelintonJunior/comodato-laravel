{{-- resources/views/components/filament/desktop-form.blade.php --}}
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

<style>
.desktop-container { background:#bdbdbd; padding:14px; }
.desktop-body { display:flex; gap:16px; align-items:flex-start; }
.desktop-form { flex:1; }
.desktop-actions { width:140px; display:flex; flex-direction:column; gap:10px; }
.desktop-actions button { border-radius:18px; }
.desktop-extra { margin-top:20px; }

/* Sugestão de estilo para as linhas e campos */
.row { display:flex; gap:12px; margin-bottom:12px; }
.field { flex:1; }
.field.small { flex:0 0 120px; }
.field.large { flex:2; }
.field.toggle { display:flex; align-items:center; gap:8px; }
</style>
