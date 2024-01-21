FROM ubuntu:latest

RUN apt-get update && apt-get install -y samba

COPY smb.conf /etc/samba/smb.conf
COPY start.sh /start.sh
COPY  /.secret /.secret

RUN chmod +x /start.sh

EXPOSE 139 445

CMD ["/start.sh"]
