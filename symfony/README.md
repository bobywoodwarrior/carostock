# CaroStock 1.0

## To deploy the app

- composer install
- php app/console doctrine:schema:update --force
- php app/console assets:install web --symlink
- php app/console doctrine:fixtures:load --append

## Docker Compose useful aliases


Some useful aliases (to put in your *~/.bash_aliases* file):
```bash
alias run-in-container='docker-compose run --rm'
alias docker-restart='docker-compose kill && docker-compose rm && sudo service docker restart' # sometimes, Docker cache must be reinitialized

alias cs-start-www='docker-compose up -d www'
alias cs-start-adminer='docker-compose up -d --no-deps adminer'
alias cs-console='docker-compose run --rm www php app/console'
alias cs-require='docker-compose run --rm www composer require'
alias cs-install='docker-compose run --rm www composer install'
alias cs-chmod='sudo chmod -R 777 docker/*/shared app/logs/ app/cache/'
alias cs-cache-clear='sudo rm -fr app/cache/* && cs-console cache:clear && sudo chmod -R 777 app/logs/* app/cache/*'
```

## Install

* Install lastest version of [Docker](https://docs.docker.com/installation/ubuntulinux/) (not the one provided by your Linux distrib)
* Install [Docker Compose](https://docs.docker.com/compose/#compose-documentation)
* Install PHP depencies with `cs-install`.
* Create the database with `cs-console doctrine:database:create`
* Run `cs-start-www` to start the Apache+PHP container
* Add the following entry to the "/etc/hosts" file of your physical machine:
```
127.0.0.1       www.carostock.local
```
* Go to http://www.carostock.local:15080/app_dev.php for a direct Apache access

## Tips & tricks

* Need a MySQL GUI? Go to [http://localhost:15081/](http://localhost:15081/?server=mysql&username=root&db=carostock) after the following command:
```bash
sf-start-adminer
```
