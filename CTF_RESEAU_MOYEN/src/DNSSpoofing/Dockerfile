# Utilisation de l'image officielle BIND9
FROM internetsystemsconsortium/bind9:9.16

# Copie du fichier de configuration principal de BIND
COPY named.conf /etc/bind/named.conf

# Copie des fichiers de zone DNS dans le conteneur
COPY zones/ /etc/bind/zones/

# Exposition des ports DNS standards
EXPOSE 53/udp 53/tcp

# Commande pour démarrer le serveur DNS lors du lancement du conteneur
CMD ["named", "-g"]
