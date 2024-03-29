FROM php:8.2-fpm

RUN apt-get update\
&& apt-get install -y libonig-dev libzip-dev libpng-dev libfreetype6-dev libjpeg62-turbo-dev zlib1g-dev libpq-dev git libicu-dev libxml2-dev libcurl4-openssl-dev

# gd
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

RUN docker-php-ext-install pdo_mysql \
&& docker-php-ext-install zip \
&& docker-php-ext-install curl \
&& docker-php-ext-install mbstring \
&& docker-php-ext-install pcntl

RUN pecl install swoole-5.0.3 \
    && docker-php-ext-enable swoole

RUN printf "" | pecl install redis-5.3.4
RUN docker-php-ext-enable redis

WORKDIR /var/www/html
