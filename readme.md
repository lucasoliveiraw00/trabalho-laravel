<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"><img src="http://www.alfaumuarama.com.br/estrutura/img/Logo_FAU_SM.png"></p>
<p align="center">Pós-Graduação Turma IV - 2019 ( WEBDEV Alfa IV ).</p>
<br>

## Trabalho com Framework Laravel 5.7.

## Tecnologias Utilizadas

-   Framework Laravel 5.7
-   Banco de Dados MYSQL
-   Docker
-   Bootstrap

## Uso

1. Criar arquivo .env com base no arquivo env.example.
2. Executar: composer update.
3. Executar: php artisan key:generate.
4. Executar docker: docker-compose up -d --build.
5. Verificar se os containers foram criados: docker ps.
6. Entrar no container em execução: docker exec -it EX:trabalho-laravel_web_1 bash.
7. Criar migrate no container em execução: php artisan migrate.
