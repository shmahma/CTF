# L'image de base 
FROM php:apache

# Copier les fichiers dans le conteneur
COPY ./website /var/www/html

# Répertoire de travail
WORKDIR /var/www/html

# Installer les dépendances nécessaires? 


# Exposez le port 80 pour Apache
EXPOSE 80

# Demarrer serveur Apache
CMD ["apache2-foreground"]
