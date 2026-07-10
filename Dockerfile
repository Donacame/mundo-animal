FROM php:8.2-apache

# Instalamos las librerías del sistema y el driver de PostgreSQL para PHP
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html

COPY . .

EXPOSE 80

CMD ["apache2-foreground"]
