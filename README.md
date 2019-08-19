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
$ docker-compose up -d --build
```

### Install Laravel 5 using Composer

```
$ docker-compose exec app composer create-project --prefer-dist "laravel/laravel=5.8.*" .
$ docker-compose exec app composer require predis/predis
```

http://127.0.0.1:10080

### Running Migrations

```
$ docker-compose exec app php artisan migrate
```

### Running Testings

```
$ docker-compose exec app ash -l
$ cp .env.example .env.testing
$ php artisan key:generate --env testing
$ sed -i -e 's/<php>/<php>\n        <env name="DB_HOST" value="db-testing" force="true"\/>/' phpunit.xml
$ ./vendor/bin/phpunit
```

### Send Test Mail

```
$ docker-compose exec app php artisan tinker
Mail::raw('test mail',function($message){$message->to('test@example.com')->subject('test');});
```

http://127.0.0.1:18025

## As necessary

### Composer dump autoload

```
$ docker-compose exec app composer dump-autoload
```

### MySQL connection

```
$ docker-compose exec db bash -c 'mysql -uroot -p${MYSQL_PASSWORD} ${MYSQL_DATABASE}'
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
$ docker-compose exec app php artisan tinker
Redis::set('name', 'hoge');
Redis::get('name');
```

### Redis cli

```
$ docker-compose exec redis redis-cli
```

### Clear database volume

```
$ docker-compose down --volumes --rmi all
$ docker-compose up -d --build
$ docker-compose exec app php artisan migrate
```

### Clone of exists code

```
$ git clone git@github.com:ucan-lab/docker-laravel5.git
$ cd docker-laravel5
$ docker-compose up -d --build

$ git clone <source code url>
$ docker-compose exec app composer install
$ docker-compose exec app ash -l
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate:fresh
```
