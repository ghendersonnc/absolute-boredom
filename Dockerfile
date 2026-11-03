FROM php:8.2.35-fpm-alpine

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json /var/www/html/composer.json
COPY ./php.ini /usr/local/etc/php/conf.d

RUN apk add --no-cache libffi \
    && apk add --no-cache --virtual .build-deps $PHPIZE_DEPS libffi-dev \
    && docker-php-ext-configure ffi --with-ffi \
    && docker-php-ext-install ffi \
    && apk del .build-deps


