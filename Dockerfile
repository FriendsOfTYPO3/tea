FROM php:7.4-cli

COPY ./ /
RUN mkdir /var/log/php-fpm
RUN apt-get update
RUN apt-get -y install curl telnet net-tools mc
RUN apt-get -y install ca-certificates apt-transport-https wget gnupg2
RUN wget -q https://packages.sury.org/php/apt.gpg -O- | apt-key add -
RUN echo "deb https://packages.sury.org/php/ buster main" | tee /etc/apt/sources.list.d/php.list
RUN apt-get update
RUN mkdir -p /run/php
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --prefer-dist --no-progress --optimize-autoloader
RUN cd /usr/local/etc/php/conf.d/ && echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini
