#!/bin/sh
set -e

# Ponto de entrada padrão para o container do PHP
# Utiliza o comando ip route para pegar o Gateway padrão para fazer funcionar o XDebug
# sem ter que configurar o endereço IP manualmente
if [ -z "$DOCKER_HOST_IP" ]; then
    DOCKER_HOST_IP=$(ip route | grep default | grep -oE "[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+")
fi

echo "\nxdebug.remote_host=$DOCKER_HOST_IP\n" >> /usr/local/etc/php/conf.d/xdebug.ini

sh /usr/local/bin/docker-php-entrypoint "$@"