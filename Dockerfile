FROM php:7.4-cli

COPY ./ /code/
RUN apt-get update \
    && apt-get -y install curl -q
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install -d /code --prefer-dist --no-progress --optimize-autoloader \
    && cd /usr/local/etc/php/conf.d/ && echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini
