### Dockerfile
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
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory
COPY . .

# Install dependencies
RUN composer install
RUN npm install
RUN npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

RUN echo "php_admin_value[output_buffering] = 16384" >> /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_value[max_input_vars] = 10000" >> /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_value[fastcgi.logging] = 1" >> /usr/local/etc/php-fpm.d/www.conf

RUN mkdir -p /var/www/storage/framework/sessions \
    && chown -R www-data:www-data /var/www/storage \
    && chmod -R 775 /var/www/storage
