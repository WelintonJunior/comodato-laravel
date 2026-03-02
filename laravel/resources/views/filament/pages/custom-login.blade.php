<div class="login-page">

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    /* =========================
       PÁGINA
    ========================= */
    .login-page {
        background-color: #203A63;
        width: 100vw;
        min-height: 100vh;
        margin-left: calc(50% - 50vw);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    .login-wrapper {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .logo img {
        height: 200px;
        margin-bottom: 30px;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 18px;
        align-items: center;
    }

    /* =========================
       FILAMENT 4 – INPUT PILL
    ========================= */

    /* container do campo */
    .fi-fo-field {
        position: relative;
        width: 420px;
    }

    /* input */
    .fi-input {
        height: 48px;
        border-radius: 30px;
        background: #d9d9d9;
        padding-left: 130px !important;
        border: none !important;
        font-size: 16px;
        box-shadow: inset 0 3px 6px rgba(0,0,0,0.3);
    }

    .fi-input:focus {
        outline: none;
    }

    /* LABEL CORRETO (Filament 4) */
    .fi-fo-field-label-ctn {
        position: absolute;

        top: 50%;
        transform: translateY(-40%);
        background: #ef7521;
        color: #ffffff;

        padding: 14px 26px; /* mais alto que o input */

        border-radius: 32px; /* acompanha o tamanho */
        font-size: 15px;
        box-shadow: 0 3px 5px 3px rgba(0,0,0,0.4);
        pointer-events: none;
        z-index: 10;
        white-space: nowrap;
    }


    /* remove margens/paddings extras do Filament */
    .fi-fo-field-label-col,
    .fi-fo-field-wrp {
        margin: 0 !important;
        padding: 0 !important;
    }

    /* =========================
       BOTÃO
    ========================= */
    .btn {
        background: #7B7B7B;
        color: white;
        border: none;
        border-radius: 30px;
        padding: 10px 28px;
        font-size: 15px;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0,0,0,0.4);
        margin-top: 10px;
    }

    .btn:hover {
        background: #f59e0b;
        color: #000;
    }

    /* =========================
       FOOTER
    ========================= */
    footer {
        width: 100%;
        background: white;
        padding: 10px 20px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    footer img {
        height: 40px;
    }

    /* =========================
       RESPONSIVO
    ========================= */
    @media (max-width: 500px) {
        .fi-fo-field {
            width: 90%;
        }

        .logo img {
            height: 150px;
        }
    }
</style>



    <div class="login-wrapper">

        {{-- LOGO --}}
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Comodato Hub">
        </div>

        {{-- ERROS --}}
        @if ($errors->any())
            <div style="color: #fff;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- FORM --}}
        <form wire:submit.prevent="authenticate">
            @csrf

            {{ $this->form }}

            <button type="submit" class="btn">
                Entrar
            </button>
        </form>

    </div>

    <footer>
        <img src="{{ asset('images/racconLogo.jpg') }}" alt="Raccoons Software">
    </footer>

</div>
