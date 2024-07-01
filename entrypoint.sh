#!/bin/bash
set -e

# Optimize Laravel
php artisan optimize

# Clear cache
php artisan cache:clear

php artisan migrate

php artisan db:seed

exec "$@"
 