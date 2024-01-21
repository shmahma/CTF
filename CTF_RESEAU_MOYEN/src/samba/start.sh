#!/bin/bash

# Démarrer le service Samba
service smbd start

# Garder le conteneur en cours d'exécution
tail -f /dev/null
