FROM php:7.1-fpm

RUN apt-get update
RUN apt-get upgrade -yphp
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get clean