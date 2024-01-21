#!/bin/bash

# Emplacement des certificats
SSL_DIR=/etc/nginx/ssl
mkdir -p $SSL_DIR

# Générez la clé et le certificat du CA (si ce n'est pas déjà fait)
if [ ! -f $SSL_DIR/ca.key ]; then
    openssl genrsa -out $SSL_DIR/ca.key 2048
    openssl req -x509 -new -nodes -key $SSL_DIR/ca.key -sha256 -days 1024 -out $SSL_DIR/ca.pem -subj "/CN=YourCA"
fi

# Générez la clé et le CSR pour le certificat intermédiaire (si ce n'est pas déjà fait)
if [ ! -f $SSL_DIR/intermediate.key ]; then
    openssl genrsa -out $SSL_DIR/intermediate.key 2048
    openssl req -new -key $SSL_DIR/intermediate.key -out $SSL_DIR/intermediate.csr -subj "/CN=YourIntermediate"
    openssl x509 -req -in $SSL_DIR/intermediate.csr -CA $SSL_DIR/ca.pem -CAkey $SSL_DIR/ca.key -CAcreateserial -out $SSL_DIR/intermediate.pem -days 500 -sha256
fi

# Générez la clé et le CSR pour le serveur (avec flag dans le CN)
if [ ! -f $SSL_DIR/server.key ]; then
    openssl genrsa -out $SSL_DIR/server.key 2048
    openssl req -new -key $SSL_DIR/server.key -out $SSL_DIR/server.csr -subj "/CN=Flag{Your_Flag_Here}"
    openssl x509 -req -in $SSL_DIR/server.csr -CA $SSL_DIR/intermediate.pem -CAkey $SSL_DIR/intermediate.key -CAcreateserial -out $SSL_DIR/server.crt -days 365 -sha256
fi

