### Testes

> usado Pest PHP

### Padronização de Codigo

> Laravel Pint usando o padrão psr12

### Instalação

>  git clone https://github.com/RenatoVi/api-tisaude

> cd api-tisaude

> cp .env.example .env

Colocar o usuario do sistema operacional na variavel de ambiente (usuario linux ou wsl):
>  SO_USER=renato

> docker-compose up -d

Onde tiver {NOME_CONTAINER} substitua pelo nome ou id do container php-fpm

> docker exec -t {NOME_CONTAINER}" composer install

> docker exec -t {NOME_CONTAINER}" php artisan migrate --seed

> docker exec -t {NOME_CONTAINER}" php artisan passport:install

### Rodar os testes

> docker exec -t {NOME_CONTAINER}" ./vendor/bin/pest

### Rodar laravel pint 

> docker exec -t {NOME_CONTAINER}" ./vendor/bin/pint

### Usando a API 

Na raiz do projeto tem a pasta postman/ e dentro dela tem um arquivo json que pode ser importado 
no postman para testar a API.
