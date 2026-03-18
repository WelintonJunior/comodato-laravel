# 🚀 Guia de Instalação - Windows

Este guia vai ajudá-lo a instalar todas as dependências necessárias para rodar o projeto Laravel no Windows.

## 📋 O que precisa ser instalado

1. **PHP 8.2+** - Linguagem de programação
2. **Composer** - Gerenciador de dependências PHP
3. **Node.js e NPM** - Para compilar assets (JavaScript/CSS)
4. **MySQL/MariaDB** - Banco de dados (opcional - pode usar SQLite para testes)

---

## 🎯 Método Rápido (Recomendado): Usando Chocolatey

### 1. Instalar Chocolatey (Gerenciador de Pacotes)

Abra o **PowerShell como Administrador** e execute:

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))
```

Feche e abra novamente o PowerShell como Administrador.

### 2. Instalar PHP, Composer e Node.js

```powershell
# Instalar PHP 8.2
choco install php -y

# Instalar Composer
choco install composer -y

# Instalar Node.js (inclui NPM)
choco install nodejs -y

# Instalar MySQL (opcional)
choco install mysql -y
```

### 3. Verificar instalações

```powershell
# Feche e abra novamente o PowerShell (sem admin) e execute:
php -v
composer --version
node --version
npm --version
```

---

## 🔧 Método Manual (Alternativo)

### 1. Instalar PHP 8.2+

1. Acesse: https://windows.php.net/download/
2. Baixe **PHP 8.2+ (Thread Safe) - ZIP**
3. Extraia para `C:\php`
4. Copie `php.ini-development` para `php.ini` na mesma pasta
5. Edite `php.ini` e descomente (remova `;`) as seguintes linhas:
   ```ini
   extension=curl
   extension=fileinfo
   extension=gd
   extension=mbstring
   extension=openssl
   extension=pdo_mysql
   extension=pdo_sqlite
   extension=zip
   ```

6. Adicione PHP ao PATH:
   - Pesquise "Variáveis de Ambiente" no Windows
   - Edite a variável "Path" do sistema
   - Adicione: `C:\php`
   - Clique OK

### 2. Instalar Composer

1. Acesse: https://getcomposer.org/download/
2. Baixe e execute o **Composer-Setup.exe**
3. Siga o instalador (ele vai detectar o PHP automaticamente)

### 3. Instalar Node.js

1. Acesse: https://nodejs.org/
2. Baixe a versão **LTS (Long Term Support)**
3. Execute o instalador
4. Marque "Automatically install necessary tools"

### 4. Instalar MySQL (Opcional)

**Opção 1: XAMPP (mais fácil)**
1. Acesse: https://www.apachefriends.org/
2. Baixe e instale o XAMPP
3. Inicie o MySQL pelo painel do XAMPP

**Opção 2: MySQL Standalone**
1. Acesse: https://dev.mysql.com/downloads/installer/
2. Baixe o MySQL Installer
3. Execute e instale o MySQL Server

---

## ✅ Configurar o Projeto

Após instalar tudo, execute o script de setup:

### Windows PowerShell (dentro da pasta do projeto):

```powershell
# Navegue até a pasta laravel
cd C:\Users\welin\Documents\Comodato\laravel

# Execute o script de setup
.\setup.ps1
```

---

## 🧪 Script de Setup Automatizado

Foi criado um script `setup.ps1` que:
- ✅ Verifica todas as dependências
- ✅ Instala pacotes PHP (Composer)
- ✅ Instala pacotes JavaScript (NPM)
- ✅ Cria arquivo .env
- ✅ Gera chave da aplicação
- ✅ Cria banco de dados SQLite
- ✅ Executa migrations
- ✅ Compila assets

---

## 🚀 Iniciar o Projeto

### Opção 1: Servidor de Desenvolvimento Laravel

```powershell
cd laravel
php artisan serve
```

Acesse: http://localhost:8000

### Opção 2: Usar todos os serviços (servidor + queue + vite)

```powershell
cd laravel
composer dev
```

Isso inicia:
- Servidor Laravel (porta 8000)
- Queue Worker (processamento de filas)
- Vite Dev Server (hot reload para assets)

---

## 🐛 Problemas Comuns

### "php não é reconhecido"
- **Solução**: Reinicie o PowerShell/Terminal após instalar
- Se persistir, adicione PHP manualmente ao PATH

### "Extension not found"
- **Solução**: Edite `php.ini` e habilite as extensões necessárias
- Localize o php.ini: `php --ini`

### "Composer is not recognized"
- **Solução**: Reinicie o terminal após instalar
- Ou execute: `C:\ProgramData\ComposerSetup\bin\composer.bat`

### Erro de permissão no Windows
- **Solução**: Execute o PowerShell como Administrador

### "SQLSTATE[HY000] [2002] Connection refused"
- **Solução**: Configure o MySQL ou use SQLite (já configurado no script)

---

## 📞 Ajuda

Se encontrar problemas:
1. Verifique se todas as extensões PHP estão habilitadas
2. Certifique-se que o MySQL está rodando (se não usar SQLite)
3. Limpe o cache: `php artisan config:clear`
4. Verifique os logs: `laravel/storage/logs/laravel.log`

---

## 🎉 Próximos Passos

Após subir o projeto:
1. Acesse o painel admin: http://localhost:8000/admin
2. Crie um usuário administrador
3. Explore os recursos disponíveis
4. Leia a documentação em [README.md](README.md)
