FROM php:7.4-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy your project files to the Apache root
COPY . /var/www/html/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Optional: Copy Apache config for rewrite rules
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
