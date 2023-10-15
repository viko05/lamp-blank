FROM php:8.2.8-apache

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
git \
libzip-dev \
unzip \
ghostscript \
&& docker-php-ext-install zip \
    pdo pdo_mysql mysqli \
&& rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql

# Install php imagic
RUN apt-get update && apt-get install -y \
    libmagickwand-dev --no-install-recommends \
    && rm -rf /var/lib/apt/lists/* \
    && pecl install imagick \
	&& docker-php-ext-enable imagick

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug