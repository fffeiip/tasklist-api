# Laravel playground

Projeto utilizado para testar libs/integrações e estudos de backend.

- Sail.
- Telescope.
- S3 (Integração padrão do storage do laravel).

## Como Executar o Projeto

- Instalar as dependências.
    > composer install

- Copiar o conteudo do arquivo [.env.example](.env.example) e criar um arquivo .env com as informações necessárias.

- Criar uma chave de aplicação 
    > php artisan key:generate

O projeto utiliza a biblioteca de cli [Sail](https://laravel.com/docs/10.x/sail) para gerenciar os containers da aplicação. 
Recomendo [configurar um alias](https://laravel.com/docs/10.x/sail#configuring-a-shell-alias) para executar os comandos. 

| Ação | Comando (com alias) |
|--|--|
|Inicializar os containers  | sail up -d|
|Encerrar os containers| sail down|
|Comando artisan| sail artisan [comando]|
|Comando composer| sail compose [comando]|
|||

- executar as migrations
    > sail artisan migrate 
- Preencher as tables dados dummy*
    > sail artisan db:seed

## Tasklist API
|  |  |
|--|--|
|Controller|[TaskController](./app/Http/Controllers/TaskController.php)|
|Rotas|[Rotas](./routes/api.php)|
|Validação de dados| [TaskRequest](./app/Http/Requests/TaskRequest.php)|
