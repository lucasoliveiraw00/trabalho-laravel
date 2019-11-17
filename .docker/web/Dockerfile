# FROM php:7.3-apache

# # Instalamos dependencias
# RUN apt-get update && apt-get upgrade -y && apt-get install -y \
#     procps \
#     nano \
#     git \
#     unzip \
#     libicu-dev \
#     libmcrypt-dev \
#     zlib1g-dev \
#     libxml2 \
#     libxml2-dev \
#     libreadline-dev \
#     supervisor \
#     locales \
#     cron \
#     libzip-dev \
#     && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
#     && docker-php-ext-install \
#     pdo_mysql \
#     intl \
#     zip 


# # Clear cache
# RUN apt-get clean && rm -fr /tmp/* && \
#     rm -rf /var/list/apt/* && \
#     rm -r /var/lib/apt/lists/*

# # Install composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # Setar locale PT-BR
# RUN echo "pt_BR.UTF-8 UTF-8" >> /etc/locale.gen && \
#     locale-gen "pt_BR.UTF-8" && \
#     dpkg-reconfigure --frontend=noninteractive locales && \
#     update-locale LANG="pt_BR.UTF-8" && \
#     # Setar Timezone America/Sao_Paulo
#     ln -fs /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime && \
#     dpkg-reconfigure -f noninteractive tzdata && \
#     # Alterar o ID do usuário www-data para ser o mesmo do host do sistema (1000)
#     usermod -u 1000 -s /bin/bash www-data && groupmod -g 1000 www-data

# WORKDIR /app

# COPY . /app

# # Dando permissões para a pasta do projeto
# RUN chmod -R 777 /app

# CMD php artisan serve --host=0.0.0.0 --port=8000

# # Expondo as portas
# EXPOSE 8000

FROM php:7.3-apache

RUN apt-get update && apt-get install -y \
    locales \
    tzdata \
    dos2unix \
    iproute2 \
    nano \
    git \
    zip \
    unzip \
    && \
    rm -rf /var/lib/apt/lists/*

# Setar locale PT-BR
RUN echo "pt_BR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen "pt_BR.UTF-8" && \
    dpkg-reconfigure --frontend=noninteractive locales && \
    update-locale LANG="pt_BR.UTF-8" && \
    # Setar Timezone America/Sao_Paulo
    ln -fs /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata && \
    # Alterar o ID do usuário www-data para ser o mesmo do host do sistema (1000)
    usermod -u 1000 -s /bin/bash www-data && groupmod -g 1000 www-data

# Configurações do Apache
COPY entrypoint.sh /usr/local/bin/entrypoint.sh

# Instalar extensões do PHP
ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/
RUN \
    # Configurar módulos e sites do apache
    a2enmod rewrite && \
    a2dissite 000-default && \
    # Configurar script entrypoint
    dos2unix /usr/local/bin/entrypoint.sh && \
    chmod +x /usr/local/bin/entrypoint.sh && \
    # Instalar extensões do PHP
    chmod uga+x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions \
    pdo_mysql \
    xdebug \
    gd \
    zip \
    soap && \
    # Instalar Composer
    curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer && \
    # Evitar o erro 'cannot create cache directory' quando rodar com usuário 1000
    mkdir -p /var/www/.composer/cache && \
    chown 1000:1000 /var/www/.composer/cache

# Configurações PHP
COPY conf.d/* /usr/local/etc/php/conf.d/

ENTRYPOINT [ "/usr/local/bin/entrypoint.sh" ]
CMD [ "apache2-foreground" ]
