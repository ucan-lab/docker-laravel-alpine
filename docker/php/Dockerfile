FROM php:7.3.1-fpm-alpine
LABEL maintainer "ucan"

COPY php.ini /usr/local/etc/php/

# Composer environment
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

# Composer install
RUN set -x && \
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
  php composer-setup.php && \
  php -r "unlink('composer-setup.php');" && \
  mv composer.phar /usr/local/bin/composer && \
  apt-get update && \
  apt-get install -y libicu-dev libzip-dev git zip unzip && \
  docker-php-ext-install intl pdo_mysql mbstring zip bcmath && \
  composer config -g repos.packagist composer https://packagist.jp && \
  composer global require hirak/prestissimo
