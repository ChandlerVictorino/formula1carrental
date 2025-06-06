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
RUN chmod 600 /etc/mysql/certs/ca.pem

# Set permissions for Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Use environment variable PORT, default to 80 if not set
ENV APACHE_LISTEN_PORT=${PORT:-80}

# Update Apache to listen on APACHE_LISTEN_PORT
RUN sed -i "s/Listen 80/Listen ${APACHE_LISTEN_PORT}/" /etc/apache2/ports.conf \
 && sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${APACHE_LISTEN_PORT}>/" /etc/apache2/sites-enabled/000-default.conf

# Set server name
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expose the port (matches APACHE_LISTEN_PORT)
EXPOSE ${APACHE_LISTEN_PORT}

# Start Apache in foreground
CMD ["apache2-foreground"]
