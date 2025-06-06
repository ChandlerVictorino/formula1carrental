FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    libicu-dev unzip zip \
    && docker-php-ext-install intl mysqli pdo pdo_mysql

RUN a2enmod rewrite

#Force Apache to serve from /public
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Optional: Fix DirectoryIndex
RUN echo 'DirectoryIndex index.php index.html' >> /etc/apache2/apache2.conf

WORKDIR /var/www/html

COPY . .

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/writable
