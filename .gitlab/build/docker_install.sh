#!/bin/bash

[[ ! -e /.dockerenv ]] && exit 0

set -xe

apt-get update -yqq
apt-get install git libzip-dev unzip libxml2-utils python-pip -yqq
pip install yamllint==1.24.2

php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/local/bin/ --filename=composer
chmod +x /usr/local/bin/composer

docker-php-ext-install zip