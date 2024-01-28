FROM php:8.1-apache

COPY index.php	/var/www/html
COPY enigme1.php /var/www/html
COPY enigme2.php /var/www/html
COPY enigme3.php /var/www/html
COPY enigme4.php /var/www/html
COPY enigme5.php /var/www/html
COPY content.php /var/www/html

RUN apt-get update && \
    apt-get install -y openssh-server && \
    ssh-keygen -A && \
    sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin without-password/' /etc/ssh/sshd_config

EXPOSE 22 80

WORKDIR /

COPY start.sh .

RUN chmod +x start.sh


CMD ["/bin/sh", "/start.sh"]

