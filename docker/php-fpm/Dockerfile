FROM php:8.1-fpm-alpine

# Arguments defined in docker-compose.yml
ARG user
ARG uid

ENV COMPOSER_MEMORY_LIMIT='-1'

# Set timezone
RUN apk add tzdata && \
    cp /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime && \
    echo "America/Sao_Paulo" > /etc/timezone && \
    apk del tzdata

# Install the PHP pdo_pgsql extention
RUN apk add --no-cache postgresql-dev && \
    docker-php-ext-install pdo_pgsql

## Install the PHP zip extention
RUN apk add --no-cache libzip-dev && \
    docker-php-ext-install zip

## Install the PHP opcache extention
RUN docker-php-ext-install -j$(nproc) opcache

## Install the PHP bcmath extension
RUN docker-php-ext-install -j$(nproc) bcmath

## Install the PHP sockets extension
RUN docker-php-ext-install -j$(nproc) sockets

## Install the PHP intl extension
RUN apk add --no-cache icu-dev && \
    docker-php-ext-install intl

## Install the PHP soap extension
RUN apk add --no-cache libxml2-dev && \
    docker-php-ext-install soap

RUN docker-php-ext-install pcntl

RUN docker-php-ext-install exif
RUN docker-php-ext-configure exif \
            --enable-exif

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN addgroup -g 1000 $user
RUN adduser -G $user -u $uid -h /home/$user -D $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

USER $user
