FROM php:8.1-apache

# pdo_mysql
RUN docker-php-ext-install -j$(nproc) pdo_mysql

RUN apt-get update && apt-get upgrade -y && apt-get install -y git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN /usr/sbin/a2enmod rewrite

RUN apt-get update && apt-get install libpq-dev -y && docker-php-ext-install pdo_pgsql

COPY default.conf /etc/apache2/sites-available/OOO-default.conf