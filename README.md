# Sistema de Gerenciamento de Produtos

Sistema desenvolvido em Laravel para gerenciar produtos e categorias.

## Funcionalidades

- ✅ CRUD completo de Produtos e Categorias
- ✅ Sistema de autenticação com sessão
- ✅ Upload de imagens (PNG/JPG)
- ✅ Uso de cookies (última categoria acessada)
- ✅ Validação de formulários
- ✅ Banco de dados MySQL

## Tecnologias

- Laravel 11.x
- PHP 8.2+
- MySQL
- Bootstrap 5

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/SEU-USUARIO/sistema-produtos-laravel.git
cd sistema-produtos-laravel
```

2. Instale as dependências:
```bash
composer install
```

3. Configure o arquivo `.env`:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o banco de dados no `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_produtos
DB_USERNAME=root
DB_PASSWORD=
```

5. Execute as migrations:
```bash
php artisan migrate
```

6. Crie o link simbólico para storage:
```bash
php artisan storage:link
```

7. Inicie o servidor:
```bash
php artisan serve
```

8. Acesse: http://localhost:8000

## Credenciais de Teste

- **E-mail:** admin@admin.com
- **Senha:** admin123

## Estrutura do Projeto

- **Models:** Produto, Categoria
- **Controllers:** ProdutoController, CategoriaController, AuthController
- **Middleware:** CheckSession (verificação de sessão)
- **Views:** Blade templates com Bootstrap

## Autor

Seu Nome - [Seu GitHub](https://github.com/SEU-USUARIO)