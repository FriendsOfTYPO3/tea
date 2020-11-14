FROM php:7.3-cli

COPY ./ /code/
WORKDIR /code
RUN apt-get update \
    && apt-get -y install parallel -q \
    && docker-php-ext-install mysqli \
    && echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini
