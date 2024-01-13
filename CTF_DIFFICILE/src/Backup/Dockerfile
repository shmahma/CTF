# Dockerfile

# UImage de base
FROM ubuntu:latest

# Dépendances 
RUN apt-get update && apt-get install -y sqlite3

# Répertoire de travail + script d'initialisation
WORKDIR /usr/src/app
COPY ./init_db.sh .

# Permissions d'exécution au script
RUN chmod +x init_db.sh

# Point d'entrée du conteneur
CMD ["./init_db.sh"]
