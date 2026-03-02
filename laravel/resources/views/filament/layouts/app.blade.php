<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>

    @filamentStyles
    @vite(['resources/css/app.css'])
</head>

<body class="bg-[#1f3b64] min-h-screen flex flex-col">

    {{-- TOPO CUSTOM --}}
    @include('filament.components.topbar')

    {{-- CONTEÚDO --}}
    <main class="flex-1 flex items-center justify-center">
        {{ $slot }}
    </main>

    {{-- NÃO TEM FOOTER AQUI --}}
    @filamentScripts
</body>
</html>
