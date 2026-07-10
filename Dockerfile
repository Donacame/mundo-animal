# Usa la imagen oficial de PHP con Apache incorporado
FROM php:8.2-apache

# Establece el directorio de trabajo dentro del servidor
WORKDIR /var/www/html

# Copia todos los archivos del proyecto al servidor
COPY . .

# Expone el puerto 80 para recibir las visitas de internet
EXPOSE 80

# Inicia el servidor Apache en primer plano
CMD ["apache2-foreground"]
