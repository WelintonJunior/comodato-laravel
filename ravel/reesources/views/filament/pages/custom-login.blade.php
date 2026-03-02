<div class="login-page">

    <style>


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

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
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 18px;
            align-items: center;
        }

        .input-group {
            display: flex;
            align-items: center;
            background: #D9D9D9;
            border-radius: 30px;
            width: 420px;
            box-shadow: inset 0 3px 6px rgba(0,0,0,0.3);
        }

        .input-label {
            background: #7B7B7B;
            color: white;
            padding: 10px 22px;
            border-radius: 30px;
            margin-right: 10px;
            white-space: nowrap;
            box-shadow: 0 3px 5px rgba(0,0,0,0.4);
        }

        .input-group input {
            border: none;
            background: transparent;
            outline: none;
            font-size: 16px;
            width: 100%;
            padding-right: 20px;
        }

        .actions {
            display: flex;
            gap: 20px;
            margin-top: 10px;
        }

        .btn {
            background: #7B7B7B;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 10px 28px;
            font-size: 15px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0,0,0,0.4);
            text-decoration: none;
        }

        .btn:hover {
            filter: brightness(1.1);
        }

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

        @media (max-width: 500px) {
            .input-group {
                width: 90%;
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
        <form wire:submit.prevent="authenticate" class="login-form">
            {{ $this->form }}

            <button type="submit" class="btn-login">
                Entrar
            </button>
        </form>


    </div>

    <footer>
        <img src="{{ asset('images/racconLogo.jpg') }}" alt="Raccoons Software">
    </footer>

</div>
