FROM php:7.4-apache

# Install mysqli
RUN docker-php-ext-install mysqli

# Copy app to Apache root
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Enable Apache rewrite
RUN a2enmod rewrite

# Expose HTTP port
EXPOSE 80

# Set Apache config
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
