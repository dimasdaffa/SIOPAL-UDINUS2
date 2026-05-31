#!/bin/sh
set -e

# Copy .env if not exists
if [ ! -f .env ]; then
    echo "Creating .env file from .env.example..."
    cp .env.example .env
fi

# Ensure composer dependencies are installed if vendor directory is missing
if [ ! -d vendor ]; then
    echo "Vendor directory not found. Running composer install..."
    composer install --no-interaction --optimize-autoloader
fi

# Generate application key if not set
if ! grep -q "APP_KEY=base" .env || [ -z "$APP_KEY" ]; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

# Run storage link if it doesn't exist
if [ ! -L public/storage ]; then
    echo "Creating storage symlink..."
    php artisan storage:link || true
fi

# Run database migrations if DB_HOST is reachable
echo "Checking database connection..."
php artisan db:monitor || echo "Database not ready yet, skipping pre-check"

echo "Running migrations..."
php artisan migrate --force || echo "Migration failed or skipped."

# Set directory permissions for web server access
echo "Setting permissions for storage and bootstrap/cache..."
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Optimizations for production environment
if [ "${APP_ENV:-production}" = "production" ]; then
    echo "Running in production mode. Optimizing Laravel..."
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
else
    echo "Running in development mode. Clearing cache..."
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear
fi

echo "Starting Supervisor to manage PHP-FPM and Nginx..."
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
