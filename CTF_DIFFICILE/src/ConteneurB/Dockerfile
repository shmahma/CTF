# Utilisez une image Apache pour PHP
FROM php:7.4-apache

# Copiez le contenu du répertoire web dans le répertoire du serveur Apache
COPY ./web/ /var/www/html/

# Exposez le port 80 pour que le trafic web puisse arriver
EXPOSE 80

# Démarrez le serveur Apache
CMD ["apache2-foreground"]
