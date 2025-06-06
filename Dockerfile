FROM php:8.0-apache

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev libzip-dev unzip git curl \
    && docker-php-ext-install pdo pdo_mysql mysqli zip

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . /var/www/html

COPY ./certs/ca.pem /etc/mysql/certs/ca.pem
RUN chmod 600 /etc/mysql/certs/ca.pem

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Copy custom entrypoint
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Server name and expose default port (Render uses PORT env var)
EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
