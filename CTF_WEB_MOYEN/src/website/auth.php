<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .error {
            color: #ff0000;
            font-weight: bold;
        }

        .success {
            color: #008000;
            font-weight: bold;
        }

        .info {
            margin-top: 20px;
        }
    </style>
    <title>Authentification</title>
</head>
<body>
    <div class="container">
        <?php
        $username_input = $_POST['username'];
        $password_input = $_POST['password'];

        
        if ($username_input === "john" && $password_input === "2923091995Fantome") {
            echo '<div class="success">Authentification réussie</div>';
            echo '<div class="info">';
            echo '<p>Nom: John Snow</p>';
            echo '<p>Âge: 29 ans</p>';
            echo '<p>ID: ZmxhZ3tXaW50ZXJJc0hlcmV9 </p>';
            echo '<p>Date de naissance: 23/09/1995</p>';
            echo '<p>Animal de compagnie: Loup (Fantôme)</p>';
            echo '<p>Titre: Seigneur Commandant de la Garde de Nuit</p>';
            echo '<p>Endroit actuel: Winterfell</p>';
            echo '</div>';
        } 
        
        elseif ($username_input === "' OR '1'='1'; --" && $password_input === "") {
            echo '<div class="success">Authentification réussie</div>';
            echo '<div class="info">';
            echo '<p>Nom: John Snow</p>';
            echo '<p>Âge: 29 ans</p>';
            echo '<p>ID: ZmxhZ3tXaW50ZXJJc0hlcmV9 </p>';
            echo '<p>Date de naissance: 23/09/1995</p>';
            echo '<p>Animal de compagnie: Loup (Fantôme)</p>';
            echo '<p>Titre: Seigneur Commandant de la Garde de Nuit</p>';
            echo '<p>Endroit actuel: Winterfell</p>';
            echo '</div>';
        } 
        // Aucun cas correspondant, authentification échouée
        else {
            echo '<div class="error">Authentification échouée. Vérifiez vos identifiants.</div>';
        }
        ?>
    </div>
</body>
</html>

