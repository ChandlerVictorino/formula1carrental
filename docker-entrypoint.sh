#!/bin/bash

# Replace Apache port with $PORT at runtime
PORT=${PORT:-80}

# Update Apache config to listen on $PORT
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-enabled/000-default.conf

# Optional: Set ServerName if needed
echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Run the main container command (apache2-foreground)
exec "$@"
