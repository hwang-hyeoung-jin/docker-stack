FROM php:8.2-fpm

# 라라벨에 필요한 PHP 확장만 설치
RUN docker-php-ext-install pdo pdo_mysql mysqli mbstring bcmath

WORKDIR /var/www/html
