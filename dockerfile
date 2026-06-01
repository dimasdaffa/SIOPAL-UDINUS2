FROM serversideup/php:8.3-fpm-nginx-alpine

USER root

WORKDIR /app

RUN apk add composer php83-session php83-tokenizer php83-xml php83-dom php83-xmlwriter php83-fileinfo php83-intl php83-xmlreader icu-dev

RUN docker-php-ext-install pdo pdo_mysql intl

COPY ./composer.json .

RUN composer install

COPY .env.example .env

DB_USERNAME=root
