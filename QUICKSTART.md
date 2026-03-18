# 🚀 Instalação Rápida - Siga estes passos

## ⚡ OPÇÃO 1: Automática (MAIS FÁCIL)

1. **Localize o arquivo:** `install-dependencies.bat`
2. **Clique com botão direito** no arquivo
3. **Selecione:** "Executar como administrador"
4. **Siga as instruções** na tela
5. **Feche o terminal** após instalação
6. **Abra um novo terminal normal** (sem admin)
7. Execute os comandos de verificação abaixo

---

## 🔍 OPÇÃO 2: Verificar o que está instalado

Abra um PowerShell normal e execute:

```powershell
cd C:\Users\welin\Documents\Comodato\laravel
.\check-requirements.ps1
```

Este script mostrará o que está instalado e o que está faltando.

---

## ⚙️ OPÇÃO 3: Manual via Chocolatey

### 1. Instalar Chocolatey

Abra **PowerShell como ADMINISTRADOR** e execute:

```powershell
Set-ExecutionPolicy Bypass -Scope Process -Force
[System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072
iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))
```

### 2. Instalar PHP, Composer e Node.js

Ainda no PowerShell como Administrador:

```powershell
choco install php composer nodejs -y
```

### 3. Fechar e reabrir o terminal

**IMPORTANTE:** Feche o PowerShell e abra um novo (sem admin).

---

## ✅ Configurar o Projeto

Após instalar tudo, **abra um PowerShell NORMAL** (não administrador):

```powershell
# 1. Ir para a pasta do projeto
cd C:\Users\welin\Documents\Comodato\laravel

# 2. Verificar requisitos
.\check-requirements.ps1

# 3. Se tudo estiver OK, executar setup
.\setup.ps1
```

O script `setup.ps1` vai:
- ✅ Instalar todas as dependências PHP
- ✅ Instalar todas as dependências JavaScript
- ✅ Criar arquivo .env
- ✅ Gerar chave da aplicação
- ✅ Criar banco de dados SQLite
- ✅ Executar migrations
- ✅ Compilar assets

---

## 🚀 Iniciar o Servidor

Após o setup, inicie o servidor:

```powershell
php artisan serve
```

Acesse em: **http://localhost:8000**

Admin: **http://localhost:8000/admin**

---

## ❓ Problemas?

### "comando não reconhecido"
- **Solução:** Feche e abra novamente o terminal

### Script não executa
- **Solução:** Execute antes:
  ```powershell
  Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
  ```

### Erro de permissão
- **Solução:** Execute o PowerShell como Administrador (apenas para instalação)

---

## 📖 Mais informações

- Guia completo: [INSTALL_WINDOWS.md](../INSTALL_WINDOWS.md)
- Documentação: [README.md](../README.md)
- Arquitetura: [ARCHITECTURE.md](../ARCHITECTURE.md)
