#!/bin/bash

[[ ! -e /.dockerenv ]] && exit 0

set -xe

apt-get update -yqq
apt-get install git libzip-dev unzip libxml2-utils wget -yqq

rm -rf /var/lib/apt/lists/*

php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin/ --filename=composer
chmod +x /usr/local/bin/composer

docker-php-ext-install zip
