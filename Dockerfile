FROM php:7.1.3-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

#instalo las dependencias de laravel
RUN php composer.phar install
# asigno los permisos de escritura

CMD [ "chown", "-R", "www-data:www-data" ]