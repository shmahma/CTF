#!/bin/sh

service ssh start
sleep 5
socat TCP-LISTEN:64603,fork,reuseaddr TCP:mysql:3306
tail -f /dev/null
