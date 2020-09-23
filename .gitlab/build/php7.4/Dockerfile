FROM php:7.4-cli

COPY ./ /code/
RUN apt-get update \
    && apt-get -y install curl git zip unzip wget parallel libxml2-utils -q \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install -d /code --prefer-dist --no-progress --optimize-autoloader \
    && echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini
