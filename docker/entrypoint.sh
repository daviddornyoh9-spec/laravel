#!/bin/sh
set -e

php artisan storage:link --force 2>/dev/null || true
php artisan package:discover --ansi
php artisan migrate --force
php artisan db:seed --force
php artisan config:clear
php artisan config:cache
php artisan view:cache

exec php artisan serve --host=0.0.0.0 --port="${PORT:-10000}"
