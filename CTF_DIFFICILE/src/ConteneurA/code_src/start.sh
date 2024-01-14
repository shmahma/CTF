#!/bin/bash

service ssh start
sleep 5
ssh -R 61001:localhost:5000 john@172.17.0.1 -i /root/.ssh/my_ssh_key -o StrictHostKeyChecking=no -p 2222 -N &

python app.py
