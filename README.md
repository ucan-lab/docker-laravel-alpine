# docker-laravel5

## Description

Build Laravel's development environment using docker.  
PHP7.3/MySQL8.0/nginx/composer/redis/node

## Usage

### Git settings(Windows Only...😇)

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
$ docker-compose run composer create-project --prefer-dist "laravel/laravel=5.8.*" .
```

http://127.0.0.1:3500

### Running Migrations

```
$ docker-compose exec app ash
$ sed -i -e "s/DB_HOST=.*/DB_HOST=db/" .env
$ php artisan migrate
```

### Running Testings

```
$ docker-compose exec app ash
$ cp .env.example .env.testing
$ php artisan key:generate --env testing
$ sed -i -e "s/DB_HOST=.*/DB_HOST=db-testing/" .env.testing
$ ./vendor/bin/phpunit
```

### Send Test Mail

```
$ docker-compose exec app ash
$ sed -i -e "s/MAIL_HOST=.*/MAIL_HOST=mail/" .env
$ sed -i -e "s/MAIL_PORT=.*/MAIL_PORT=1025/" .env

$ php artisan tinker
Mail::raw('test mail',function($message){$message->to('test@example.com')->subject('test');});
```

http://127.0.0.1:3504

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

### Node(npm)

```
$ docker-compose run node npm install
$ docker-compose run node npm run dev
```

### Node(yarn)

```
$ docker-compose run node yarn install
$ docker-compose run node yarn run dev
```

### Redis for Laravel

```
$ docker-compose exec app ash
$ composer require predis/predis
$ sed -i -e 's/REDIS_HOST=.*/REDIS_HOST=redis/' .env
$ sed -i -e 's/CACHE_DRIVER=.*/CACHE_DRIVER=redis/' .env
$ sed -i -e 's/SESSION_DRIVER=.*/SESSION_DRIVER=redis/' .env

$ php artisan tinker
Redis::set('name', 'hoge');
Redis::get('name');
```

### Redis cli

```
$ docker-compose exec redis ash
$ redis-cli
```

### Clear database volume

```
$ docker volume ls
local               ${COMPOSE_PROJECT_NAME}_db-data

$ docker volume rm ${COMPOSE_PROJECT_NAME}_db-data
```
