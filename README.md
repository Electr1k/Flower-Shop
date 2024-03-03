<p align="center">
    <a href="https://laravel.com" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/27/PHP-logo.svg/2560px-PHP-logo.svg.png" height="150" alt="PHP Logo"></a>
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" height="150" alt="Laravel Logo"></a>
    <a href="https://www.postgresql.org" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Postgresql_elephant.svg/993px-Postgresql_elephant.svg.png" height="150" alt="Postgresql Logo"></a>
</p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Учебный проект серверная часть для магазина цветов.
Учебный проект на PHP 8.1 с фреймворком Laravel 10.4. Так же в проекте были использованы следкющие технологии:
<ul>
    <li>Аутентификация Sanctum</li>
    <li>Bootstrap (Admin LTE 3)</li>
    <li>Вебсокет (удаленный сервер Pusher)</li>
    <li>Swagger</li>
</ul>

Серверная часть состоит из:
<ul>
    <li>API</li>    
    <li>Админ панель (с аутентификацией)</li>
</ul>

Сервер предоставляет следующий функционал:
<ul>
    <li>Аутентификация (с разделением ролей)</li>
    <li>Создание, удаление, получение, изменение цветов</li>
    <li>Создание, удаление, получение, изменение категорий</li>
    <li>Создание, удаление, получение, изменение тегов</li>
    <li>Создание, удаление, получение, изменение пользователей</li>
    <li>Добавление и удаление товаров из корзины</li>
    <li>Создание заказа пользователем</li>
    <li>Изменение статуса заказа администратором</li>
</ul>
Url админ панели: {baseURL}/admin <br>
<a href="https://app.getpostman.com/join-team?invite_code=992cb323c9cc56aa8281c25c05982dc2&target_code=3bfb829a11d1a0b43dc7b823660b0b77">Endpoints on postman</a>

## Get started
Для запуска сервера необходимо клонировать данный репозиторий, добавить файл .env, указав соединение с БД и Pusher. Для запуска:
<ul>
    <li>php artisan serve (для хоста сервера)</li>
    <li>npm install dev (для подгрузки пакетов админки)</li>
</ul>
