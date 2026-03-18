# Script para verificar requisitos do sistema

Write-Host "🔍 Verificando Requisitos do Sistema" -ForegroundColor Cyan
Write-Host "=====================================" -ForegroundColor Cyan
Write-Host ""

function Test-Command {
    param($command)
    $null = Get-Command $command -ErrorAction SilentlyContinue
    return $?
}

function Get-CommandVersion {
    param($command, $args)
    try {
        $output = & $command $args 2>&1 | Select-Object -First 1
        return $output
    } catch {
        return "Erro ao obter versão"
    }
}

$requirements = @(
    @{Name="PHP"; Command="php"; Args="-v"; Required=$true; MinVersion="8.2"},
    @{Name="Composer"; Command="composer"; Args="--version"; Required=$true},
    @{Name="Node.js"; Command="node"; Args="--version"; Required=$true; MinVersion="18.0"},
    @{Name="NPM"; Command="npm"; Args="--version"; Required=$true},
    @{Name="Git"; Command="git"; Args="--version"; Required=$false},
    @{Name="MySQL"; Command="mysql"; Args="--version"; Required=$false}
)

$allRequired = $true
$missingCommands = @()

foreach ($req in $requirements) {
    Write-Host "$($req.Name):" -NoNewline -ForegroundColor White
    Write-Host " " -NoNewline
    
    if (Test-Command $req.Command) {
        $version = Get-CommandVersion $req.Command $req.Args
        Write-Host "✅ Instalado" -ForegroundColor Green
        Write-Host "   $version" -ForegroundColor Gray
        
        if ($req.MinVersion) {
            Write-Host "   Versão mínima: $($req.MinVersion)" -ForegroundColor Gray
        }
    } else {
        if ($req.Required) {
            Write-Host "❌ NÃO INSTALADO (Obrigatório)" -ForegroundColor Red
            $allRequired = $false
            $missingCommands += $req.Name
        } else {
            Write-Host "⚠️  NÃO INSTALADO (Opcional)" -ForegroundColor Yellow
        }
    }
    Write-Host ""
}

# Verificar extensões PHP
if (Test-Command "php") {
    Write-Host "Extensões PHP:" -ForegroundColor White
    $extensions = @("curl", "fileinfo", "gd", "mbstring", "openssl", "pdo", "pdo_mysql", "tokenizer", "xml", "zip")
    
    foreach ($ext in $extensions) {
        $loaded = php -r "echo extension_loaded('$ext') ? 'yes' : 'no';" 2>$null
        if ($loaded -eq "yes") {
            Write-Host "   ✅ $ext" -ForegroundColor Green
        } else {
            Write-Host "   ❌ $ext (necessária)" -ForegroundColor Red
            $allRequired = $false
        }
    }
    Write-Host ""
}

# Resumo
Write-Host "=====================================" -ForegroundColor Cyan
if ($allRequired) {
    Write-Host "✅ Todos os requisitos obrigatórios estão instalados!" -ForegroundColor Green
    Write-Host ""
    Write-Host "Próximo passo:" -ForegroundColor Cyan
    Write-Host "   Execute: .\setup.ps1" -ForegroundColor White
} else {
    Write-Host "❌ Alguns requisitos obrigatórios estão faltando!" -ForegroundColor Red
    Write-Host ""
    Write-Host "Itens faltando:" -ForegroundColor Yellow
    foreach ($item in $missingCommands) {
        Write-Host "   - $item" -ForegroundColor Red
    }
    Write-Host ""
    Write-Host "📖 Consulte o guia de instalação:" -ForegroundColor Cyan
    Write-Host "   ..\INSTALL_WINDOWS.md" -ForegroundColor White
    Write-Host ""
    Write-Host "Ou execute (como Administrador):" -ForegroundColor Cyan
    Write-Host "   choco install php composer nodejs -y" -ForegroundColor White
}
Write-Host ""
