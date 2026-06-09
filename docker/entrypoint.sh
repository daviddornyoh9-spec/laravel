#!/bin/sh
set -e

# Render generateValue does not produce Laravel-compatible APP_KEY values.
case "$APP_KEY" in
  base64:*)
    ;;
  *)
    unset APP_KEY
    if [ ! -f .env ]; then
      cp .env.example .env
    fi
    php artisan key:generate --force
    ;;
esac

php artisan storage:link --force 2>/dev/null || true
php artisan package:discover --ansi
php artisan migrate --force
php artisan db:seed --force
php artisan config:clear
php artisan config:cache
php artisan view:cache

exec php artisan serve --host=0.0.0.0 --port="${PORT:-10000}"
