
# Desafio Técnico PHP/Laravel

## Configuração inicial do projeto

1. Clone do projeto `https://github.com/bradoctech/teste-php-laravel`
1. Executei o `composer install`
1. Criei o arquivo `.env` executando: `cp .env.example .env`
1. Gerei o APP_KEY executando:  `php artisan key:generate`
1. Executei o migrate passando parâmetros de seed: `php artisan migrate:fresh --seed --seeder=CategorySeeder`

### Primeira Tarefa:

Crítica das Migrations e Seeders: Aponte problemas, se houver, e solucione; Implemente melhorias;

- Ao executar o comando de migrate, foi criado o arquivo:  `database/db.sqlite` (indicado no .env);
- Na sequência, o banco foi criado a partir de `database/schema/sqlite-schema.sql`;
- Tive como resposta, uma falha na migration `2023_03_28_172350_create_categories_table`, indicando que a tabela `categories` já existe;
