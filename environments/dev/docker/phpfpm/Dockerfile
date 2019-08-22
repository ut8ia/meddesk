FROM php:7.2-fpm-alpine3.7
WORKDIR /app
RUN apk update && apk upgrade\
    && apk add --no-cache php7-pdo php7-pdo_mysql php7-mysqli php7-bcmath php7-gd php7-curl
RUN docker-php-ext-install mysqli && \
	docker-php-ext-install pdo_mysql && \
    docker-php-ext-install mbstring
EXPOSE 9000
