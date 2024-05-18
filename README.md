<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# AjudaTchê

Projeto destinado à ajudar as pessoas atingidas por desastres naturais no Rio Grande do Sul. Esperamos que este projeto possa ser ajudar outras pessoas em situações criticas.

## Requisitos para rodar o projeto

* PHP 8.2 ou superior
* Composer 2.1+
* Banco de dados de sua preferencia (Atualmente utilizado com Mysql e PostgreSQL)
* NodeJS 20+
* npm 10+

## Como utilizar o projeto em ambiente local?

Clone o projeto com o seguinte comando

´´´
git clone https://github.com/lucassaraiva5/ajuda-tche-laravel
´´´

Utilize os comandos abaixo para executar o projeto

´´´
cd ajuda-tche-laravel
composer install
npm i
php artisan key:generate
´´´

Edite o arquivo .env para as suas configurações necessarias
E apos isso o seguinte comando para realizar a migração do DB

´´´
php artisan migrate
´´´

## Para rodar o projeto utilize os seguintes comandos

Terminal 1
´´´
 php artisan serve
´´´

Terminal 2
´´´
npm run dev
´´´
