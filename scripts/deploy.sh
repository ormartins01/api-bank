
#!/usr/bin/env bash

echo "Runing composer"
composer install --no-dev --working-dir=/var/www/html

echo "Caching config"
php artisan config:cache

echo "Caching routes"
php artisan route:cache

echo "Runing migrations"
php artisan migrate --force