# Utilisez une image de base Debian ou Ubuntu
FROM debian:latest

# Installez OpenSSL et Nginx
RUN apt-get update && \
    apt-get install -y openssl nginx && \
    rm -rf /var/lib/apt/lists/*

COPY create-certs.sh /usr/local/bin/create-certs.sh
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Exécutez le script pour créer les certificats
RUN chmod +x /usr/local/bin/create-certs.sh && \
    /usr/local/bin/create-certs.sh

# Exposez le port HTTPS
EXPOSE 443

# Commande pour démarrer Nginx
CMD ["nginx", "-g", "daemon off;"]
