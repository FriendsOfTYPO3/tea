#!/bin/bash

[[ ! -e /.dockerenv ]] && exit 0

set -xe

apt-get update -yqq
apt-get install git libzip-dev unzip parallel libxml2-utils wget wait-for-it libicu-dev -yqq

php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin/ --filename=composer
chmod +x /usr/local/bin/composer

docker-php-ext-install pdo_mysql zip mysqli intl
cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
sed -i 's/error_reporting = E_ALL/ & ~E_DEPRECATED/g' /usr/local/etc/php/php.ini
