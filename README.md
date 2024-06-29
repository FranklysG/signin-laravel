<p align="center"><a href="https://laravel.com" target="_blank"><img src="/resources/assets/featured.png" width="400" alt="Laravel Logo"></a></p>
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

##### Create .env : 

```yml
cp .env.example .env
```

Open this project in other terminal and run 
##### Docker run : 

```yml
docker-compose up
```

On project vscode terminal run, one and one
##### Compose and Migrations : 

```yml
docker exec -it signin_app_web composer install
docker exec -it signin_app_web php artisan migrate:fresh --seed
docker exec -it signin_app_web php artisan test
```
##### Run Project Frontend : 

```yml
yarn && yarn dev
```
##### Show Frontend : 

```yml
http://localhost
```
##### Default user : 

```yml
login: admin@gmail.com
pass: password
```