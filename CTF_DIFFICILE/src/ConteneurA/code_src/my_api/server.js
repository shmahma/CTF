const express = require('express');
const sqlite3 = require('sqlite3').verbose();
const bodyParser = require('body-parser');

const app = express();
app.use(bodyParser.json());

const db = new sqlite3.Database('/app/database.db');

// Middleware pour vérifier les clés API
app.use((req, res, next) => {
    const apiKey = req.headers['x-api-key'];

    db.get('SELECT * FROM users WHERE api_key = ?', [apiKey], (err, row) => {
        if (err) {
        console.error(err.message); // Ajoutez cette ligne
            return res.status(500).send("Erreur interne du serveur");
        }
        if (!row) {
            return res.status(401).send("Clé API invalide");
        }
        next();
    });
});

app.post('/change-permission', (req, res) => {
    const { username, newPermission } = req.body;

    // Mise à jour de la base de données pour modifier les permissions
    db.run('UPDATE users SET permission = ? WHERE username = ?', [newPermission, username], (err) => {
        if (err) {
            return res.status(500).send("Erreur lors de la mise à jour");
        }
        res.send("Permission mise à jour avec succès");
    });
});


const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Serveur démarré sur le port ${PORT}`);
});
