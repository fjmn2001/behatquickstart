FROM php:8-apache

## Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Setup SO Libraries
RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git