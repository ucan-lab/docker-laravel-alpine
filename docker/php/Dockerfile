FROM php:7.3.4-fpm-alpine
LABEL maintainer "ucan"

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
  apk add --update --no-cache icu-dev libzip-dev autoconf gcc g++ make git zip unzip tzdata && \
  cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
  echo "Asia/Tokyo" > /etc/timezone && \
  pecl install xdebug && \
  apk del autoconf gcc g++ make tzdata && \
  docker-php-ext-install intl pdo_mysql mbstring zip bcmath && \
  docker-php-ext-enable xdebug && \
  composer config -g repos.packagist composer https://packagist.jp && \
  composer global require hirak/prestissimo && \
  mkdir $PSYSH_DIR && wget $PHP_MANUAL_URL -P $PSYSH_DIR

# Config
COPY php.ini /usr/local/etc/php
COPY aliases.sh /etc/profile.d
COPY profile.sh /etc/profile.d
COPY crontab/laravel /var/spool/cron/crontabs/root
