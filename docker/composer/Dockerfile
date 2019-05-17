FROM php:7.3.5-fpm-alpine
LABEL maintainer "ucan"

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

RUN set -eux && \
  apk update && \
  apk add --update --no-cache unzip && \
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
  composer config -g repos.packagist composer https://packagist.jp && \
  composer global require hirak/prestissimo

ENTRYPOINT ["composer"]
