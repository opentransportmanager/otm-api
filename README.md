# OpenTransportManager master API

## Requirements
-   Docker
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

Build and start docker services

```
docker-compose up -d
```

Your application is by default accesible at

```
http://localhost:80
```

Available docker services
- php-fpm
- postgres
- redis
- webserver (nginx)



