## Description
  Crud project using php7.2, Laravel 5.5 and bootstrap
## Prerequisites 
- A working installation of php >= 7.2
- Have composer installed
- Have laravel installed
- Have mysql installed
- Set password information on .env file, at root of project

## Instalation
- create database (mysql) with name 'flexy_product'
- clone the project using the link: https://github.com/RaphaelCavalcante/flexy-product.git
- change the settings for database access*
- To create all tables and realtions on database, run: 
```bash
    $php artisan:migrate
```
- populate tags table, run: 
```bash
    $php artisan:seed
  
```
- start the server, run:
```bash
    $php artisan:serve
  
```
* i'd have some problems to setup a instance of Homestead so, i've used the local dev enviroment
