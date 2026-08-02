FROM php:8.2-cli

# Install system requirements, PostgreSQL drivers, and Laravel required extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libicu-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql intl zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set up the application folder
WORKDIR /app
COPY . .

# Install Laravel dependencies
RUN composer install --optimize-autoloader --no-dev

# Start the Laravel server on Render's required port
CMD php artisan serve --host=0.0.0.0 --port=$PORT