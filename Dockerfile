# Use official PHP image with Apache
FROM php:8.2-apache

# Install PHP extensions required by CodeIgniter 3
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    zip \
    && docker-php-ext-install mysqli pdo pdo_mysql zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy all project files
COPY . /var/www/html

# Fix permissions for cache and logs directories
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/application/cache \
    && chmod -R 775 /var/www/html/application/logs

# Apache listens on port 80
EXPOSE 80

# Start Apache in foreground
CMD ["apache2-foreground"]
