<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center">
ECommerce REST API
</h1>

<h5 align="center">
REST API for E-Commerce platform.
</h5>

<p align="center">
    <a href="https://github.com/muhammadhabibfery/laracommerce-api/actions/workflows/ci.yml">
    <img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/muhammadhabibfery/laracommerce-api/ci.yml?logo=github">
    <a href="https://www.php.net">
        <img src="https://img.shields.io/badge/php-%3E%3D8.1-%23777BB4" />
    </a>
    <a href="https://laravel.com">
        <img src="https://img.shields.io/badge/laravel-9.x-%23EC4E3D" />
    </a>
</p>

</br>

| [Features][] | [Requirements][] | [Install][] | [How to setting][] | [API Docs][] | [License][] |


- |<h3>Menu  </h3>        |       Description                                                                 |
  |-----------------------|-----------------------------------------------------------------------------------|
  |<b>Users               | </b>Create employee and manage all users.                                         |
  |<b>Orders              | </b>Manage the orders.                                                            |
  |<b>Finances            | </b>Manage the finances.                                                          |
  |<b>Withdraw            | </b>Manage the merchant's withdraw request.                                       |
  |<b>Bankings            | </b>Create and manage available banking for merchant.                             |
  |<b>Categories          | </b>Create and manage available category for merchant's products.                 |
  |<b>Profile             | </b>Edit user's profile and password.                                             |


## Requirements

	PHP = ^8.1.x
    laravel = ^9.x
    kavist/rajaongkir = ^1.x
    midtrans/midtrans-php = ^2.x
    laravel/scout = ^9.x
    filament/filament = ^2.x
    beyondcode/laravel-websockets = ^1.x
    pusher/pusher-php-server = ^7.x
    flowframe/laravel-trend = ^0.1.x
    barryvdh/laravel-debugbar = ^3.x
    laravel-echo = ^1.15.x
    pusher-js = ^8.x

## Install

Clone repo

```
git clone https://github.com/imnishantnirala/LaraECommerce-API.git 
```

Install Composer


[Download Composer](https://getcomposer.org/download/)


composer update/install 

```
composer install
```

## How to setting 

Go into .env file change Database and Email credentials. Then setup some configuration with your own credentials
```

APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:QRvu9fCy6xP6aVMhkDgy5AlfrgvGlsoSxFKDqa3vj+I=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecomm
DB_USERNAME=root
DB_PASSWORD=

```

Run the migration

```
php artisan migrate
```

Or run the migration with seeder if you want seeding the related data

```
php artisan migrate --seed
```

Generate a New Application Key

```
php artisan key:generate
```

Create a symbolic link

```
php artisan storage:link
```

## API Docs

</br>
<p style="font-weight: bold;">
Complete REST API Documentation can be found <a href="#">here</a>
</p>


## License


[Requirements]:#requirements
[Install]:#install
[How to setting]:#how-to-setting
[API Docs]:#api-docs
[License]:#license

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
