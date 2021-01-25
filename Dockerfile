FROM php:7.1.3-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html
