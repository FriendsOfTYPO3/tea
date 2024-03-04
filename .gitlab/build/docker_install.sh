#!/bin/bash

[[ ! -e /.dockerenv ]] && exit 0

set -xe

apt-get update -yqq
apt-get install git libzip-dev unzip parallel libxml2-utils wget wait-for-it
