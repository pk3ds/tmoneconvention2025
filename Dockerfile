# Dockerfile
FROM composer:2.6 AS composer
FROM php:8.2-cli AS composer-stage

# Install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip

WORKDIR /var/www
COPY composer.* ./
RUN composer install --prefer-dist --no-scripts --no-progress --no-interaction

FROM node:18 as node-builder
WORKDIR /var/www
COPY package*.json ./
COPY --from=composer-stage /var/www/vendor ./vendor
RUN npm install
COPY . .
RUN npm run build

FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

WORKDIR /var/www

# Copy application files
COPY . .
COPY --from=composer-stage /var/www/vendor ./vendor
COPY --from=node-builder /var/www/public/build ./public/build

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache
