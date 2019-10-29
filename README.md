# docker-laravel

## Description

Build Laravel's development environment using docker.
PHP7.3/MySQL8.0/nginx/composer/redis/node

## Build

### Git settings for Windows OS user

```
$ git config --global core.autocrlf false
```

### A. Create Laravel Project

Build a new Laravel project.

```
$ git clone git@github.com:ucan-lab/docker-laravel.git
$ cd docker-laravel
$ make create-project
```

http://127.0.0.1:10080

### B. Clone and Install

It is assumed that Laravel is already installed.

```
$ git clone git@github.com:ucan-lab/docker-laravel.git
$ cd docker-laravel
$ make install
```

http://127.0.0.1:10080

## Tips

### Running Migrations

```
$ make app
$ php artisan migrate
```

### Running Testings

```
$ make app
$ cp .env.example .env.testing
$ php artisan key:generate --env testing
$ sed -i -e 's/<php>/<php>\n        <env name="DB_HOST" value="db-testing" force="true"\/>/' phpunit.xml
$ ./vendor/bin/phpunit
```

### Send Test Mail

```
$ make tinker
Mail::raw('test mail',function($message){$message->to('test@example.com')->subject('test');});
```

http://127.0.0.1:18025

### Composer dump autoload

```
$ make app
$ composer dump-autoload
```

### MySQL connection

```
$ docker-compose exec db bash -c 'mysql -uroot -p${MYSQL_PASSWORD} ${MYSQL_DATABASE}'
```

### Node(npm)

```
$ make npm
```

### Node(yarn)

```
$ make yarn
```

### Redis for Laravel

```
$ make tinker
Redis::set('name', 'hoge');
Redis::get('name');
```

### Redis cli

```
$ docker-compose exec redis redis-cli
```

### Clear database volume

```
$ make destroy
$ make up
```
