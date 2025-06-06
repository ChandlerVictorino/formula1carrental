FROM php:7.4-apache

# Install PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

# Enable mod_rewrite for CodeIgniter
RUN a2enmod rewrite

# Copy Apache virtual host config
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Copy source code to Apache root
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Expose port 80 to Render
EXPOSE 80
