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
###### Now it's ready for further development!

### Optional configuration
##### Customizing ports
Docker uses port forwarding to expose additional ports outside of container.  
In docker-compose.yml this is declared with external_port:internal_port formula
e.g.
```yaml
ports:
    - "8000:80"
```
If you want to change webserver or database ports, simply change the first number and restart the service.  
Changes in database service will require tweaking DB_PORT in .env file.

##### Running additional seeders
In your .env file set:
```
APP_ENV=testing
```

Then restart setup service:
```
docker-compose restart setup
```
### Development
##### Using terminal inside container
Running all CLI commands (e.g. php, composer) from inside the service is highly recommeded   
For general purposes you can open SSH connection with php-fpm Bash shell
```
docker exec -it php-fpm bash
```

If you need universal command to set up SSH with any running Docker shell via local terminal
```
docker exec -it <container_name> /bin/sh -c "[ -e /bin/bash ] && /bin/bash || /bin/sh"
```
##### Testing with Behat (Gherkin implementation)

To run tests locally type
```
./vendor/bin/behat
```
Note: Github CI will run these on push and pull requests too

Available docker services
- php-fpm (redis, mysql and composer included)
- mariadb (default external port 8003)
- webserver (nginx, default external port 8000)
- redis
- setup (runs automated project setup jobs)

##### Omitting docker
At the current stage you can also build and test this application on your local machine while omitting docker.  
The general requirements is PHP 7.4 with MySQL extension enabled.  
You will also need to configure .env file to match your local database configuration and use built-in php server.

## Documentation
- TBD



