FROM php:7.4-apache

# Install mysqli extension and enable mod_rewrite
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli && a2enmod rewrite

# Copy application files
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# (Optional) Apache virtual host config for mod_rewrite
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
