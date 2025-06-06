FROM php:7.4-apache

# Install required PHP extensions
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite for CodeIgniter
RUN a2enmod rewrite

# Optional: update Apache default config for .htaccess
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Copy your CodeIgniter app into container
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Expose port 80 to make it available externally
EXPOSE 80

# Apache runs by default; no CMD needed
