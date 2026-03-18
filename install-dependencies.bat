@echo off
echo ========================================
echo  INSTALACAO RAPIDA - Laravel/PHP
echo ========================================
echo.
echo Este script vai instalar:
echo   - PHP 8.2
echo   - Composer
echo   - Node.js
echo.
echo IMPORTANTE: Execute este arquivo como ADMINISTRADOR!
echo (Botao direito no arquivo ^> Executar como administrador)
echo.
pause

echo.
echo Verificando se Chocolatey esta instalado...
where choco >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo.
    echo Chocolatey nao encontrado. Instalando...
    echo.
    powershell -NoProfile -ExecutionPolicy Bypass -Command "Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))"
    
    if %ERRORLEVEL% NEQ 0 (
        echo.
        echo ERRO: Falha ao instalar Chocolatey!
        echo Instale manualmente visitando: https://chocolatey.org/install
        pause
        exit /b 1
    )
    
    echo.
    echo Chocolatey instalado com sucesso!
    echo Reiniciando script...
    timeout /t 3
    call "%~f0"
    exit /b 0
) else (
    echo Chocolatey ja esta instalado!
)

echo.
echo ========================================
echo Instalando PHP 8.2...
echo ========================================
choco install php --version=8.2.0 -y
if %ERRORLEVEL% NEQ 0 (
    echo AVISO: Erro ao instalar PHP, tentando continuar...
)

echo.
echo ========================================
echo Instalando Composer...
echo ========================================
choco install composer -y
if %ERRORLEVEL% NEQ 0 (
    echo AVISO: Erro ao instalar Composer, tentando continuar...
)

echo.
echo ========================================
echo Instalando Node.js...
echo ========================================
choco install nodejs -y
if %ERRORLEVEL% NEQ 0 (
    echo AVISO: Erro ao instalar Node.js, tentando continuar...
)

echo.
echo ========================================
echo Atualizando variaveis de ambiente...
echo ========================================
call refreshenv

echo.
echo ========================================
echo INSTALACAO CONCLUIDA!
echo ========================================
echo.
echo IMPORTANTE: Feche este terminal e abra um novo para
echo            usar os comandos instalados.
echo.
echo Proximos passos:
echo   1. Feche este terminal
echo   2. Abra um novo PowerShell/Terminal (SEM admin)
echo   3. Va para pasta: cd C:\Users\welin\Documents\Comodato\laravel
echo   4. Execute: .\check-requirements.ps1
echo   5. Execute: .\setup.ps1
echo.
echo Para verificar se tudo foi instalado:
echo   php -v
echo   composer --version
echo   node --version
echo.
pause
