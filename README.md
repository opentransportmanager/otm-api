# OpenTransportManager master API

## Requirements
-   Docker
-   TBD

## Installation

Clone this repository

```
git clone https://github.com/opentransportmanager/otm-api.git
```

Install necessary dependencies
```
composer install
```

In the root of a project copy .env.example into .env
```
cp .env_example .env
```

Generate your app key
```
php artisan key:generate
```

Build and start docker services

```
docker-compose up -d
```

Your application is by default accesible at

```
http://localhost:8000
```

Available docker services
- php-fpm (with redis and pgsql drivers installed)
- postgres (port 8004)
- webserver (nginx)
- redis




