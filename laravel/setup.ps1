# Laravel setup script (ASCII only)
# Run this script from the laravel/ folder.

Write-Host "Starting Laravel setup..." -ForegroundColor Green
Write-Host ""

function Test-Command {
    param($command)
    $null = Get-Command $command -ErrorAction SilentlyContinue
    return $?
}

Write-Host "Checking dependencies..." -ForegroundColor Cyan

$allGood = $true

if (Test-Command "php") {
    $phpVersion = php -v | Select-Object -First 1
    Write-Host "PHP installed: $phpVersion" -ForegroundColor Green
} else {
    Write-Host "PHP not found." -ForegroundColor Red
    Write-Host "Install PHP 8.2+ before continuing." -ForegroundColor Yellow
    Write-Host "See: INSTALL_WINDOWS.md" -ForegroundColor Yellow
    $allGood = $false
}

if (Test-Command "composer") {
    $composerVersion = composer --version --no-ansi | Select-Object -First 1
    Write-Host "Composer installed: $composerVersion" -ForegroundColor Green
} else {
    Write-Host "Composer not found." -ForegroundColor Red
    Write-Host "Install Composer before continuing." -ForegroundColor Yellow
    Write-Host "See: INSTALL_WINDOWS.md" -ForegroundColor Yellow
    $allGood = $false
}

if (Test-Command "node") {
    $nodeVersion = node --version
    Write-Host "Node.js installed: $nodeVersion" -ForegroundColor Green
} else {
    Write-Host "Node.js not found." -ForegroundColor Red
    Write-Host "Install Node.js before continuing." -ForegroundColor Yellow
    Write-Host "See: INSTALL_WINDOWS.md" -ForegroundColor Yellow
    $allGood = $false
}

if (Test-Command "npm") {
    $npmVersion = npm --version
    Write-Host "NPM installed: v$npmVersion" -ForegroundColor Green
} else {
    Write-Host "NPM not found." -ForegroundColor Red
    $allGood = $false
}

if (-not $allGood) {
    Write-Host ""
    Write-Host "Install missing dependencies before continuing." -ForegroundColor Yellow
    Write-Host "See: INSTALL_WINDOWS.md" -ForegroundColor Cyan
    exit 1
}

Write-Host ""
Write-Host "All dependencies are installed." -ForegroundColor Green
Write-Host ""

$continue = Read-Host "Continue with setup? (y/n)"
if ($continue -ne 'y' -and $continue -ne 'Y') {
    Write-Host "Setup canceled." -ForegroundColor Yellow
    exit 0
}

Write-Host ""

Write-Host "Installing PHP dependencies (Composer)..." -ForegroundColor Cyan
composer install --no-interaction
if ($LASTEXITCODE -ne 0) {
    Write-Host "Composer install failed." -ForegroundColor Red
    exit 1
}
Write-Host "PHP dependencies installed." -ForegroundColor Green
Write-Host ""

Write-Host "Installing JavaScript dependencies (NPM)..." -ForegroundColor Cyan
npm install
if ($LASTEXITCODE -ne 0) {
    Write-Host "NPM install failed." -ForegroundColor Red
    exit 1
}
Write-Host "JavaScript dependencies installed." -ForegroundColor Green
Write-Host ""

if (-not (Test-Path ".env")) {
    Write-Host "Creating .env file..." -ForegroundColor Cyan

    if (Test-Path ".env.example") {
        Copy-Item ".env.example" ".env"
        Write-Host "Created .env from .env.example" -ForegroundColor Green
    } else {
        Write-Host ".env.example not found. Creating a basic .env" -ForegroundColor Yellow

        $envContent = @"
APP_NAME=Comodato
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=comodato
# DB_USERNAME=root
# DB_PASSWORD=

CACHE_STORE=database
SESSION_DRIVER=database
QUEUE_CONNECTION=database

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local

MAIL_MAILER=log
"@
        Set-Content -Path ".env" -Value $envContent
        Write-Host "Created .env" -ForegroundColor Green
    }
} else {
    Write-Host ".env already exists. Keeping current settings." -ForegroundColor Cyan
}
Write-Host ""

Write-Host "Generating app key..." -ForegroundColor Cyan
php artisan key:generate --no-interaction
Write-Host "App key generated." -ForegroundColor Green
Write-Host ""

$dbPath = "database\database.sqlite"
if (-not (Test-Path $dbPath)) {
    Write-Host "Creating SQLite database..." -ForegroundColor Cyan
    New-Item -Path $dbPath -ItemType File -Force | Out-Null
    Write-Host "SQLite database created." -ForegroundColor Green
} else {
    Write-Host "SQLite database already exists." -ForegroundColor Cyan
}
Write-Host ""

Write-Host "Run migrations now?" -ForegroundColor Cyan
$runMigrations = Read-Host "Run migrations? (y/n)"
if ($runMigrations -eq 'y' -or $runMigrations -eq 'Y') {
    php artisan migrate --force
    if ($LASTEXITCODE -eq 0) {
        Write-Host "Migrations completed." -ForegroundColor Green
    } else {
        Write-Host "Migration failed. Run: php artisan migrate" -ForegroundColor Yellow
    }
} else {
    Write-Host "Migrations skipped. Run later: php artisan migrate" -ForegroundColor Yellow
}
Write-Host ""

Write-Host "Building assets..." -ForegroundColor Cyan
npm run build
if ($LASTEXITCODE -eq 0) {
    Write-Host "Assets built." -ForegroundColor Green
} else {
    Write-Host "Asset build failed. Try: npm run build" -ForegroundColor Yellow
}
Write-Host ""

Write-Host "Clearing caches..." -ForegroundColor Cyan
php artisan config:clear
php artisan cache:clear
php artisan view:clear
Write-Host "Caches cleared." -ForegroundColor Green
Write-Host ""

Write-Host "========================================" -ForegroundColor Green
Write-Host "Setup completed." -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Green
Write-Host ""
Write-Host "To start the server:" -ForegroundColor Cyan
Write-Host "  php artisan serve" -ForegroundColor White
Write-Host ""
Write-Host "App URL:" -ForegroundColor Cyan
Write-Host "  http://localhost:8000" -ForegroundColor White
Write-Host ""
Write-Host "Admin URL:" -ForegroundColor Cyan
Write-Host "  http://localhost:8000/admin" -ForegroundColor White
Write-Host ""
Write-Host "See README.md for more info." -ForegroundColor Cyan
Write-Host ""

$startServer = Read-Host "Start the server now? (y/n)"
if ($startServer -eq 'y' -or $startServer -eq 'Y') {
    Write-Host "Starting server..." -ForegroundColor Green
    Write-Host "Press Ctrl+C to stop" -ForegroundColor Yellow
    Write-Host ""
    php artisan serve
}
