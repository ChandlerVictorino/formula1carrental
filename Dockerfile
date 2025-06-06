# Use official PHP image with required extensions
FROM php:8.2-apache

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev libzip-dev unzip git curl \
    && docker-php-ext-install pdo pdo_mysql mysqli zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files to container
COPY . /var/www/html

# Copy CA cert into container
COPY ./certs/ca.pem /etc/mysql/certs/ca.pem

# Secure the cert file
RUN chmod 600 /etc/mysql/certs/ca.pem

# Set correct permissions for Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose HTTP port
EXPOSE 80
