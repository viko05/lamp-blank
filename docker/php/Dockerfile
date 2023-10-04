FROM php:8.2-apache

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
git \
libzip-dev \
unzip \
&& docker-php-ext-install zip \
&& rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug