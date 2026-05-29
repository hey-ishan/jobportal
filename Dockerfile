# Use PHP 8.3 with Apache for a production-ready web server
FROM php:8.3-apache

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    zip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql pdo_pgsql pgsql \
    && a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Change Apache document root to Laravel's public folder natively
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/public/!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# OPTIMIZATION: Copy composer files FIRST to leverage Docker layer caching
COPY composer.json composer.lock ./

# Install production dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy the rest of the application code
COPY . .

# CRITICAL FIX: Remove cached bootstrap files copied from local environment
RUN rm -rf bootstrap/cache/*.php

# Now safely run Laravel package discovery
RUN composer run-script post-autoload-dump

# IMPORTANT: Set proper permissions for Laravel's storage and cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configure Apache to use a default port of 8080
ENV PORT=8080
RUN echo "Listen 8080" > /etc/apache2/ports.conf
RUN sed -ri -e 's!\*:80!\*:8080!g' /etc/apache2/sites-available/*.conf

# Start Apache in foreground, but safely inject the dynamic $PORT provided by Render/Railway at runtime first
CMD sed -i "s/8080/$PORT/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf && apache2-foreground
