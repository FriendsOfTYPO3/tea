FROM php:7.4-fpm

COPY ./ /code/
RUN mkdir /var/log/php-fpm
RUN apt-get update
RUN apt-get -y install curl telnet net-tools mc
RUN apt-get -y install ca-certificates apt-transport-https wget gnupg2 rsync
RUN wget -q https://packages.sury.org/php/apt.gpg -O- | apt-key add -
RUN echo "deb https://packages.sury.org/php/ buster main" | tee /etc/apt/sources.list.d/php.list
RUN apt-get update
RUN mkdir -p /run/php
RUN apt-get install -y procps
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /code;composer install --prefer-dist --no-progress --optimize-autoloader
RUN cd /usr/local/etc/php/conf.d/ && echo 'memory_limit = 512M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini
RUN echo "#!/bin/bash" > /usr/sbin/php-start
RUN echo "/usr/sbin/php-fpm7.4 --nodaemonize --fpm-config /etc/php/7.4/fpm/php-fpm.conf" >> /usr/sbin/php-start
RUN chmod 755 /usr/sbin/php-start
RUN  mkdir -p /healthcheck
RUN echo "<?php echo 'OK'; ?>" > /healthcheck/index.php

CMD ["/usr/sbin/php-start"]

