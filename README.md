# Sistema de Comodato

Sistema de gerenciamento de comodato desenvolvido com Laravel 12, Filament 3 e Livewire.

## 🚀 Tecnologias

- **Laravel 12** - Framework PHP
- **Filament 3** - Painel administrativo
- **Livewire** - Componentes reativos
- **Livewire Flux** - UI Components
- **Laravel Fortify** - Autenticação
- **PHP 8.2+**

## 📋 Funcionalidades

- ✅ Gestão de Produtos
- ✅ Controle de Vendedores
- ✅ Gerenciamento de PDVs (Pontos de Venda)
- ✅ Cadastro de Fornecedores
- ✅ Controle de Entradas
- ✅ Gestão de Usuários
- ✅ Autenticação e Autorização

## 🏗️ Arquitetura

Este projeto segue os princípios da **Clean Architecture**, com separação clara de responsabilidades em camadas:

- **Domain**: Lógica de negócio pura  
- **Application**: Casos de uso e orquestração
- **Infrastructure**: Acesso a dados e serviços externos
- **Presentation**: Interface do usuário (Filament, Livewire, Controllers)

Para mais detalhes, consulte [ARCHITECTURE.md](ARCHITECTURE.md).

## 📦 Instalação

### ⚡ **Instalação Rápida (Windows)**

**Se você ainda não tem PHP, Composer ou Node.js instalados:**

1. Execute o arquivo `install-dependencies.bat` **como administrador**
2. Ou siga o guia: **[QUICKSTART.md](QUICKSTART.md)** ⭐

**Já tem tudo instalado? Pule para [Configuração do Projeto](#configurar-projeto)**

---

### Pré-requisitos

- PHP 8.2 ou superior
- Composer
- Node.js e NPM
- MySQL/MariaDB

### Passos

<a id="configurar-projeto"></a>

### 🔧 Configurar o Projeto

**Opção 1: Script Automático (Recomendado)**

```powershell
cd laravel
.\setup.ps1
```

Este script fará tudo automaticamente!

---

**Opção 2: Manual**

1. **Clone o repositório**
   ```bash
   git clone https://github.com/WelintonJunior/comodato-laravel.git
   cd comodato-laravel
   ```

2. **Instale as dependências**
   ```bash
   cd laravel
   composer install
   npm install
   ```

3. **Configure o ambiente**
   ```bash
   cp .env_example .env
   # Edite o .env com suas configurações de banco de dados
   ```

4. **Gere a chave da aplicação**
   ```bash
   php artisan key:generate
   ```

5. **Execute as migrations**
   ```bash
   php artisan migrate
   ```

6. **Compile os assets**
   ```bash
   npm run build
   # Ou para desenvolvimento:
   npm run dev
   ```

7. **Inicie o servidor**
   ```bash
   php artisan serve
   ```

Acesse em: `http://localhost:8000`

## 🗂️ Estrutura do Projeto

```
comodato-laravel/
├── laravel/               # Aplicação Laravel
│   ├── app/
│   │   ├── Application/   # Casos de uso
│   │   ├── Domain/        # Lógica de negócio
│   │   ├── Infrastructure/# Acesso a dados
│   │   ├── Presentation/  # Camada de apresentação
│   │   └── Providers/     # Service Providers
│   ├── config/            # Configurações
│   ├── database/          # Migrations e Seeders
│   ├── public/            # Assets públicos
│   ├── resources/         # Views e assets
│   ├── routes/            # Rotas da aplicação
│   └── storage/           # Arquivos gerados
├── .env_example           # Exemplo de variáveis de ambiente
├── .gitignore            # Arquivos ignorados pelo Git
└── ARCHITECTURE.md       # Documentação da arquitetura
```

## 🔧 Scripts Disponíveis

```bash
# Desenvolvimento
composer dev              # Inicia servidor, queue worker e Vite

# Build
npm run build             # Compila assets para produção
composer setup            # Setup completo do projeto

# Testes
composer test             # Executa testes
php artisan test          # Testes com Pest

# Qualidade de código
vendor/bin/pint           # Laravel Pint (code styling)
```

## 🌐 Painel Administrativo

O sistema utiliza **Filament 3** como painel administrativo.

Acesse em: `http://localhost:8000/admin`

### Recursos Disponíveis

- **Produtos** - Gerenciamento completo de produtos
- **Vendedores** - Cadastro e controle de vendedores
- **PDVs** - Pontos de venda
- **Fornecedores** - Gestão de fornecedores
- **Entradas** - Controle de entradas de produtos
- **Usuários** - Gerenciamento de usuários do sistema

## 📝 Variáveis de Ambiente

As principais variáveis estão documentadas em [.env_example](.env_example).

### Configurações Essenciais

```env
# Aplicação
APP_NAME="Comodato"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# Banco de Dados
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=comodato
DB_USERNAME=root
DB_PASSWORD=

# Outros
CACHE_STORE=database
SESSION_DRIVER=database
QUEUE_CONNECTION=database
```

## 🤝 Contribuindo

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add: Amazing Feature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT.

## 👥 Autor

**Welinton Junior**
- GitHub: [@WelintonJunior](https://github.com/WelintonJunior)

## 📞 Suporte

Para suporte, entre em contato através das issues do GitHub.

---

**Nota**: Este é um projeto em desenvolvimento. Algumas funcionalidades podem estar incompletas.
