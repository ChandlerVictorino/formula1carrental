FROM php:8.0-apache

# Install required packages and PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev unzip zip \
    && docker-php-ext-install intl mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache to serve from /public
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Optional: Set the default directory index
RUN echo 'DirectoryIndex index.php index.html' >> /etc/apache2/apache2.conf

# Set working directory
WORKDIR /var/www/html

# Copy your project files into the container
COPY . .

# Set permissions (skip /writable to avoid error if it doesn't exist)
RUN chown -R www-data:www-data /var/www/html

# Optional: If you need /writable directory, uncomment below and ensure it exists
# RUN chmod -R 755 /var/www/html/writable
