# Estrutura do Projeto - Clean Architecture

Este projeto Laravel foi reorganizado seguindo os princípios da Clean Architecture, mantendo a compatibilidade com Filament, Livewire e demais dependências.

## 📁 Estrutura de Diretórios

```
laravel/app/
├── Application/           # Camada de Aplicação
│   ├── Actions/          # Actions do Fortify e outras ações
│   ├── DTOs/             # Data Transfer Objects
│   └── UseCases/         # Casos de uso da aplicação
│
├── Domain/               # Camada de Domínio
│   ├── Entities/         # Entidades puras do domínio
│   ├── Repositories/     # Interfaces de repositórios
│   └── Services/         # Interfaces de serviços de domínio
│
├── Infrastructure/       # Camada de Infraestrutura
│   ├── Persistence/      
│   │   └── Models/       # Eloquent Models (App\Models)
│   ├── Repositories/     # Implementações de repositórios
│   └── Services/         # Implementações de serviços externos
│
├── Presentation/         # Camada de Apresentação
│   ├── Filament/         # Recursos, Pages e Widgets do Filament
│   │   ├── Pages/
│   │   ├── Resources/
│   │   └── Widgets/
│   ├── Forms/            # Componentes de formulário customizados
│   ├── Http/             # Controllers e Middleware
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Livewire/         # Componentes Livewire
│   └── View/             # View Components
│
└── Providers/            # Service Providers do Laravel
```

## 🏗️ Camadas da Clean Architecture

### 1. **Domain (Domínio)**
- Contém a lógica de negócio pura
- Independente de frameworks e bibliotecas externas
- Define interfaces/contratos para repositórios e serviços

### 2. **Application (Aplicação)**
- Orquestra o fluxo de dados entre as camadas
- Contém casos de uso (Use Cases)
- Actions e DTOs

### 3. **Infrastructure (Infraestrutura)**
- Implementação de detalhes técnicos
- Eloquent Models (ORM)
- Conexões com banco de dados
- Serviços externos (APIs, Email, etc)

### 4. **Presentation (Apresentação)**
- Interface com o usuário
- Filament Admin Panel
- Controllers HTTP
- Componentes Livewire
- Views e Components

## 🔄 Mapeamento de Namespaces

Os namespaces foram configurados no `composer.json` para manter compatibilidade:

```json
{
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "App\\Models\\": "app/Infrastructure/Persistence/Models/",
            "App\\Domain\\": "app/Domain/",
            "App\\Application\\": "app/Application/",
            "App\\Infrastructure\\": "app/Infrastructure/",
            "App\\Presentation\\": "app/Presentation/"
        }
    }
}
```

### Modelos (Models)
- **Namespace**: `App\Models\`
- **Localização física**: `app/Infrastructure/Persistence/Models/`
- **Motivo**: Mantém compatibilidade com Laravel e Filament

### Recursos Filament
- **Namespace**: `App\Filament\...`
- **Localização física**: `app/Presentation/Filament/...`

### Controllers
- **Namespace**: `App\Http\Controllers\`
- **Localização física**: `app/Presentation/Http/Controllers/`

### Livewire Components
- **Namespace**: `App\Livewire\`
- **Localização física**: `app/Presentation/Livewire/`

## 📝 Modelos Disponíveis

- `User` - Usuários do sistema
- `Produto` - Produtos
- `Vendedor` - Vendedores
- `Pdv` - Pontos de venda
- `Fornecedor` - Fornecedores
- `Entrada` - Entradas de produtos
- `Nucleo` - Núcleos

## 🚀 Próximos Passos

1. **Criar Interfaces de Repositório** em `app/Domain/Repositories/`
2. **Implementar Repositórios** em `app/Infrastructure/Repositories/`
3. **Criar Use Cases** em `app/Application/UseCases/`
4. **Adicionar DTOs** para transferência de dados entre camadas
5. **Mover lógica de negócio** dos Models para Services/UseCases

## 📚 Benefícios desta Estrutura

- ✅ **Separação de Responsabilidades**: Cada camada tem uma função clara
- ✅ **Testabilidade**: Fácil criar testes unitários para cada camada
- ✅ **Manutenibilidade**: Código organizado e fácil de encontrar
- ✅ **Escalabilidade**: Estrutura preparada para crescimento do projeto
- ✅ **Independência de Framework**: Lógica de negócio desacoplada
- ✅ **Compatibilidade**: Mantém funcionamento com Filament e Livewire

## ⚠️ Observações Importantes

1. Após modificar o `composer.json`, sempre execute:
   ```bash
   composer dump-autoload
   ```

2. Os namespaces dos arquivos foram mantidos compatíveis com suas localizações originais
3. A estrutura física reflete Clean Architecture, mas os namespaces mantêm compatibilidade

## 🔧 Limpeza Realizada

Foram removidos do projeto:
- ❌ Pasta `ravell/` (backup duplicado)
- ❌ Pasta `ravel/` (lixo)
- ❌ Pastas duplicadas na raiz (Models, Providers, Http, etc)
- ❌ Arquivo `PdvResource.php` duplicado em `laravel/`
- ❌ Pastas vazias (Produtos, Schemas, Tables em `laravel/`)
- ❌ Pasta `laravel/laravel/` (estrutura duplicada)

