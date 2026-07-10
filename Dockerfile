FROM php:8.2-apache

# Copia todo tu proyecto al servidor Apache
COPY . /var/www/html/

# Habilita extensiones necesarias (si usas MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expone el puerto 80
EXPOSE 80
