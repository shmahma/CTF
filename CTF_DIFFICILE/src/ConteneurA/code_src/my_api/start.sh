#!/bin/bash

service ssh start
sleep 8
ssh -R 63302:localhost:3000 john@172.17.0.1 -i /root/.ssh/my_ssh_key_4 -o StrictHostKeyChecking=no -p 2222 -N &
node server.js
