#!/bin/bash

# Crée la base de données et les tables
sqlite3 CTF_DB.db << EOF
CREATE TABLE ServerA (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    password TEXT NOT NULL
);

CREATE TABLE ServerB (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    password TEXT NOT NULL
);

INSERT INTO ServerA (username, password) VALUES ('5ve77Vsw9B2', 'TGJoX3BuYWdfdGhyZmZfdmdfXl0=');
INSERT INTO ServerB (username, password) VALUES ('3vf24b', 'SVGVLRRGSQ3PUQD=');
EOF

# Laisse le script en cours d'exécution pour maintenir le conteneur actif
tail -f /dev/null
