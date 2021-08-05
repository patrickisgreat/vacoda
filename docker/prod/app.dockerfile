FROM cyberduck/php-fpm-laravel:7.2

ARG ssh_prv_key
ARG ssh_pub_key
ARG known_hosts

COPY composer.lock composer.json /var/www/

COPY database /var/www/database

WORKDIR /var/www

# Authorize SSH Host
RUN apt-get update && \
    apt-get install -y \
        git \
        openssh-server && \
    mkdir -p /root/.ssh && \
    chmod 0700 /root/.ssh && \
    echo "$known_hosts" > /root/.ssh/known_hosts && \
    echo "$ssh_prv_key" > /root/.ssh/id_rsa && \
    echo "$ssh_pub_key" > /root/.ssh/id_rsa.pub && \
    chmod 600 /root/.ssh/id_rsa && \
    chmod 600 /root/.ssh/id_rsa.pub && \
    curl --silent --show-error https://getcomposer.org/installer | php

COPY ./auth.json /root/.composer/auth.json

RUN php composer.phar install --no-dev --no-scripts --no-interaction \
    && rm composer.phar

COPY . /var/www

RUN chown -R www-data:www-data \
        /var/www/storage \
        /var/www/bootstrap/cache

# RUN php artisan optimize

# Remove SSH keys
RUN rm -rf /root/.ssh/
