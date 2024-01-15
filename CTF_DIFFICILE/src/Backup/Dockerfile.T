FROM php:8.1-apache

COPY images /var/www/html
COPY info.txt /var/www/html
COPY indice.txt /var/www/html
COPY ident.txt /var/www/html
COPY mail.txt /var/www/html
COPY message.html /var/www/html

RUN apt-get update && \
    apt-get install -y openssh-server && \
    ssh-keygen -A && \
    sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin without-password/' /etc/ssh/sshd_config

EXPOSE 22 80

WORKDIR /

COPY start.sh .

RUN chmod +x start.sh

COPY apache-directory-listings.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

CMD ["/bin/sh", "/start.sh"]

