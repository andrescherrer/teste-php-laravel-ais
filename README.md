
# Desafio Técnico PHP/Laravel

## Configuração inicial do projeto

1. Clone do projeto `https://github.com/bradoctech/teste-php-laravel`
1. Executei o `composer install`
1. Criei o arquivo `.env` executando: `cp .env.example .env`
1. Gerei o APP_KEY executando:  `php artisan key:generate`
1. Executei o migrate passando parâmetros de seed: `php artisan migrate:fresh --seed --seeder=CategorySeeder`

### Primeira Tarefa:

Crítica das Migrations e Seeders: Aponte problemas, se houver, e solucione; Implemente melhorias;

- Ao executar o comando de migrate, foi criado o arquivo:  `database/db.sqlite` (indicado no `.env`);
- Na sequência, o banco foi criado a partir de `database/schema/sqlite-schema.sql`;
- Tive como resposta, uma falha na migration `2023_03_28_172350_create_categories_table`, indicando que a tabela `categories` já existe;

### Análise e Solução:

- Comparei a linha que cria a tabela `categories` no arquivo `sqlite-schema.sql` com a migration `2023_03_28_172350_create_categories_table` e constatei que as saídas dos 2 são diferentes:
1. No (schema) os campos são criados nesta ordem: `id, name, created_at, updated_at`;
1. Já na (migration), nesta ordem: `id, created_at, updated_at, name`;
- Além disso, percebi que a tabela `migrations` os registros referentes à criação da tabela `categories` e `documents` estavam com nomes direfentes de `2023_03_28_172350_create_categories_table` e `2023_03_28_172401_create_documents_table` respectivamente;

Migrations:

- Removi os registros da tabela `migrations` referentes às migrations de criação da `categories` e `documents`
- Comando SQL: `DELETE from migrations where id in (5,6);`;
- Removi as tabelas `documents` e `categories` nesta ordem;
- Comando SQL remoção `documents`: `DROP  table documents;`;
- Comando SQL remoção `categories`: `DROP  table categories;`;

Schema:

- Percebi que os nomes das migrations tanto `categories` quanto `documents` estavam diferentes das migrations existentes no projeto;
- Alterei o script `sqlite-schema.sql` para inserir o nome correto da migration da tabela `categories` `2023_03_28_172350_create_categories_table`;
- Alterei o script `sqlite-schema.sql` para inserir o nome correto da migration da tabela `documents` `2023_03_28_172401_create_documents_table`;


