<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

> ### Example Laravel 8 codebase containing real world examples (CRUD, auth, advanced patterns and more).

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    git clone git@github.com:cesarureno/laravel-8.git

Switch to the repo folder

    cd laravel-8

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

**Make sure you set the correct database connection information before running the migrations**

    php artisan migrate

Install passport

    php artisan passport:install

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

    php artisan serve

Run tests

    php artisan test

Database backup

    php artisan database:backup

You can configure database backup mode in the .env file

    #auto, manual, both
    BACKUP_MODE=both

You can configure database tables for backup in the .env file

    BACKUP_TABLES=companies,users,corporations,documents

This project was development using Best Practices 

[Conventional commits](https://www.conventionalcommits.org/en/v1.0.0/)

[Code sniffer](https://github.com/squizlabs/PHP_CodeSniffer)

[Testing](https://laravel.com/docs/8.x/testing)

[Github Actions](https://github.com/cesarureno/laravel-8/actions)

