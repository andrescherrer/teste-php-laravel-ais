
# Desafio Técnico PHP/Laravel

O teste foi desenvolvido em uma estrura de containers (Sail) do próprio Laravel.

## Configuração inicial do projeto

- Clone do projeto:
```
https://github.com/bradoctech/teste-php-laravel
```

- Executei o:
```
composer install
```

- Criei o arquivo `.env` executando:
```
cp .env.example .env
```

- Gerei o APP_KEY executando:
```
php artisan key:generate
```

- Executei o migrate passando parâmetros de seed:
```
php artisan migrate:fresh --seed --seeder=CategorySeeder
```

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

- Removi os registros da tabela `migrations` referentes às migrations de criação da `categories` e `documents`;

Comando SQL: 

```
DELETE from migrations where id in (5,6);
```

- Removi as tabelas `documents` e `categories` nesta ordem;

Comando SQL remoção `documents`:
```
DROP  table documents;
```

Comando SQL remoção `categories`: 

```
DROP  table categories;
```

Schema:

- Percebi que os nomes das migrations tanto `categories` quanto `documents` estavam diferentes das migrations existentes no projeto;
- Alterei o script `sqlite-schema.sql` para inserir os nomes corretos das migrations das tabelas `categories` e `documents` com os valores: `2023_03_28_172350_create_categories_table` e `2023_03_28_172401_create_documents_table` respectivamente.

Seeder:

- Com objetivo de manter os dados da tabela `categories` coerentes, alterei o arquivo seeder de categories `CategorySeeder` para adicionar as datas de criação e atualização aos registros;
- Alterei o método `run` do arquivo `DatabaseSeeder` para `$this->call([ CategorySeeder::class, ]);` para que quando for passado o parâmetro --seed na migrate, seja executado o arquivo `DatabaseSeeder`.

Melhoria arquivos de Migrations e Schema:

- Alterações em `2023_03_28_172350_create_categories_table`:
- Alterei o campo id para increments (unsigned integer);
- Alterei a ordem da criação dos campos, deixando o created_at e updated_at por último;
- Alterei a ordem dos campos no arquivo schema na criacao da tabela `documents` para ficar na mesma ordem que no arquivo de migration.

Execução do comando de Migration com Seed

```
php artisan migrate:fresh --seed
```

### Segunda Tarefa:

Crie a estrutura completa de uma tela que permita adicionar a importação do arquivo `storage/data/2023-03-28.json`, para a tabela `documents`. onde cada registro representado neste arquivo seja adicionado a uma fila para importação.

Feito isso crie uma tela com um botão simples que dispara o processamento desta fila.

Utilize os padrões que preferir para as tarefas.

### Solução:

Foi criada uma classe ImportJsonFile(Controller) responsável por fazer a leitura do arquivo JSON outra classe SentDocumentQueue (Controller) para fazer o envio dos dados à fila através do Job SendDocumentJob além de outros arquivos blades para renderização das views.

## Terceira Tarefa:

Crie um test unitário que valide o tamanho máximo do campo conteúdo.

Crie um test unitário que valide a seguinte regra:

Se a categoria for "Remessa" o título do registro deve conter a palavra "semestre", caso contrário deve emitir um erro de registro inválido.
Se a caterogia for "Remessa Parcial", o titulo deve conter o nome de um mês(Janeiro, Fevereiro, etc), caso contrário deve emitir um erro de registro inválido.

### Solução

Foi adicionada uma classe de Teste (DocumentUnitTest) para valiar os itens desta tarefa.