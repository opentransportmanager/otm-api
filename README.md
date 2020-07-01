# OpenTransportManager API

## Requirements
- Docker installed on your machine

## Installation

Clone this repository

```
git clone https://github.com/opentransportmanager/otm-api.git
```

Run docker containers from the project root:
```
docker-compose up -d
```
It will auto-install required dependencies, create matching .env file with new application key and migrate the database 

Done! Your application should be by default accesible at:
```
http://localhost:8000
```
###### And now it's ready for further development!

### Development
Set up tethered SSH connection with php-fpm container in your terminal:
```
docker exec -it php-fpm bash
```
You now have access to various useful tools (php, composer, apt-get and such)

### Optional
If you want to seed the database:
```
php artisan db:seed
```

If you want to run tests locally then run
```
./vendor/bin/behat
```
If you need universal command to set up SSH with any running Docker shell via local terminal
```
docker exec -it <container_name> /bin/sh -c "[ -e /bin/bash ] && /bin/bash || /bin/sh"
```

Available docker services
- php-fpm (redis, mysql and composer included)
- mariadb (default external port 8003)
- webserver (nginx, default external port 8000)
- redis

##### Omitting docker
At the current stage you can also build and test this application on your local machine while omitting docker.  
The general requirements is PHP 7.4 with MySQL extension enabled.  
You will also need to configure .env file to match your local database configuration and use built-in php server.

## Documentation
- TBD



