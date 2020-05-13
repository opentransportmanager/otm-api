# OpenTransportManager master API

## Requirements
-   Docker 17.3+
-   TBD

## Installation

Clone this repository

```
git clone https://github.com/opentransportmanager/otm-api.git
```

In the root of a project copy .env.example into .env
```
cp .env_example .env
```

Generate your app key

```
php artisan key:generate
```

Enter laradock folder and copy env-example file into .env

```
cd laradock
cp env-example .env
```

Build nad start docker services

```
docker-compose up -d
```

Your application is by default accesible at

```
http://localhost:80
```

If you've edited any docker files, you might need to rebuild specific images

```
docker-compose build <service_name>
```

If you need to access terminal inside of docker, then type

```
docker-compose exec workspace bash
```

Available docker services
- php-fpm
- postgres
- redis
- nginx
- workspace (contains a lot of tools e.g. npm, composer and drivers, might require some cleanup in the feature)


