#!/bin/bash

service ssh start
sleep 8
ssh -R 62501:localhost:5000 john@172.17.0.1 -i /root/.ssh/my_ssh_key -o StrictHostKeyChecking=no -p 2222 -N &

su - flaskuser
python app.py
