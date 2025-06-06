# Use PHP with Apache
FROM php:8.1-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable mod_rewrite for CodeIgniter
RUN a2enmod rewrite

# Copy CodeIgniter files into the web root
COPY . /var/www/html

# Fix permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Use custom Apache config
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Expose Apache's default port
EXPOSE 80
