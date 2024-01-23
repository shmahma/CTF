FROM php:8.1-apache

COPY info.txt /var/www/html

RUN apt-get update && \
    apt-get install -y openssh-server && \
    ssh-keygen -A && \
    sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin without-password/' /etc/ssh/sshd_config

EXPOSE 80

WORKDIR /


COPY apache-directory-listings.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

