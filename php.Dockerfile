FROM php:8.2-fpm

# 필수 패키지 + PHP 확장 설치
RUN apt-get update \
 && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
 && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    bcmath \
    zip \
 && pecl install redis \
 && docker-php-ext-enable redis \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
