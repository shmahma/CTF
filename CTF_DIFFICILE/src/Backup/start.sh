#!/bin/sh

service ssh start
sleep 8
service apache2 start
ssh -R 61000:localhost:80 john@172.17.0.1 -i /root/.ssh/my_ssh_key_2 -o StrictHostKeyChecking=no -p 2222 -N &
tail -f /dev/null
