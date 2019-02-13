FROM php:7.3.2-fpm-alpine
LABEL maintainer "ucan"

COPY php.ini /usr/local/etc/php

# Composer environment
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# tinker(psysh)
ARG PSYSH_DIR=/usr/local/share/psysh
ARG PHP_MANUAL_URL=http://psysh.org/manual/ja/php_manual.sqlite

# Composer install
RUN set -eux && \
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
  php composer-setup.php && \
  php -r "unlink('composer-setup.php');" && \
  mv composer.phar /usr/local/bin/composer && \
  apk update && \
  apk add icu-dev libzip-dev git zip unzip && \
  docker-php-ext-install intl pdo_mysql mbstring zip bcmath && \
  composer config -g repos.packagist composer https://packagist.jp && \
  composer global require hirak/prestissimo && \
  mkdir $PSYSH_DIR && wget $PHP_MANUAL_URL -P $PSYSH_DIR
