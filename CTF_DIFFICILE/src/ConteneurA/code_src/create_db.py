import sqlite3

# Connexion à SQLite et création d'une nouvelle base de données
conn = sqlite3.connect('database.db')

# Création d'un curseur pour exécuter des commandes SQL
cur = conn.cursor()

# Création de la table 'users' avec une colonne supplémentaire 'permission'
cur.execute('''
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    password TEXT NOT NULL,
    api_key TEXT NOT NULL,
    permission TEXT
)
''')

# Insérer quelques utilisateurs pour tester
cur.execute("INSERT INTO users (username, password, api_key, permission) VALUES ('ibtissam', 'password123', 'key123', 'user')")
cur.execute("INSERT INTO users (username, password, api_key, permission) VALUES ('sarah', 'password456', 'key456', 'user')")

# Valider et enregistrer les changements
conn.commit()

# Fermer la connexion à la base de données
conn.close()

print("Base de données créée avec succès et table 'users' ajoutée.")
