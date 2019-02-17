# docker-laravel5

## Description

Build Laravel's development environment using docker.  
PHP7.3/MySQL8.0/nginx/composer/redis/node

## Usage

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

### Laravel new project install

```
$ docker-compose exec app ash
$ composer create-project --prefer-dist laravel/laravel .
```

http://127.0.0.1:3500

### Laravel migration execute

```
$ docker-compose exec app ash
$ php artisan migrate
```

## As necessary

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
