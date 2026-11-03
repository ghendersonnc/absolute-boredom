FROM php:8.2.35-fpm-alpine

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json /var/www/html/composer.json
