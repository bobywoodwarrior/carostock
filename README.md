CaroStock

## To deploy the app

- composer install
- php app/console doctrine:schema:update --force
- php app/console assets:install web --symlink
- php app/console doctrine:fixtures:load --append
- chmod 777 -R app/