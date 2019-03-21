# docker-laravel5

## Description

Build Laravel's development environment using docker.  
PHP7.3/MySQL8.0/nginx/composer/redis/node

## Usage

### Git settings

windows only ... 😇

```
$ git config --global core.autocrlf false
```

### Git clone

```
$ git clone git@github.com:ucan-lab/docker-laravel5.git
$ cd docker-laravel5
```

### Docker compose build & up

```
$ docker-compose build
$ docker-compose up -d
```

### Install Laravel 5 using Composer

```
$ docker-compose exec app composer create-project --prefer-dist "laravel/laravel=5.8.*" .
```

http://127.0.0.1:3500

### Running Migrations

```
$ docker-compose exec app php artisan migrate
```

## As necessary

### Login shell of the app container

```
$ docker-compose exec app ash -l
```

[alias settings](docker/php/aliases.sh) is enabled by `-l` option.

### MySQL connection

```
$ docker-compose exec db bash
$ mysql -u${MYSQL_USER} -p${MYSQL_PASSWORD} ${MYSQL_DATABASE}
```

### Node(npm, yarn)

```
$ docker-compose run node ash
$ npm install # OR yarn install
$ npm run dev # OR yarn run dev
```

### Redis for Laravel

```
$ docker-compose exec app ash
$ composer require predis/predis
$ sed -i -e 's/CACHE_DRIVER=.*/CACHE_DRIVER=redis/' .env
$ sed -i -e 's/SESSION_DRIVER=.*/SESSION_DRIVER=redis/' .env
```

### Redis cli

```
$ docker-compose exec redis ash
$ redis-cli
```
