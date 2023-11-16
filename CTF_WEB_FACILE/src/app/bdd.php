<?php

$host = "mysql";
$dbname = "my-wonderful-website";
$charset = "utf8";
$port = "3306";

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port",
            "root",
            "super-secret-password"
        );

        if (isset($_POST['query'])) {
            $query = $_POST['query'];

            $result = $pdo->query("SELECT * FROM Indices WHERE indice = '$query'");
            $rows = $result->fetchAll(PDO::FETCH_ASSOC);

            if (count($rows) > 0) {
                echo '<pre>';
                foreach ($rows as $row) {
			echo '<p style="color: blue; text-align: center;">Returned Value: ' . $row['flag'] . '</p>';

                }
                echo '</pre>';
            } else {
                echo '<p class="error-message">Aucune ligne trouvée.</p>';
            }
        } else {
            echo '<p class="error-message">No request!</p>';
        }

    } catch (PDOException $e) {
        throw new PDOException(
            message: $e->getMessage(),
            code: (int)$e->getCode()
        );
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interrogation de la BDD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        div {
            width: 50%;
            margin: auto;
            padding: 20px;
            margin-top: 50px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-top: 10px;
            color: #333;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error-message, p {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div>
    <h2>Interrogation de la BDD</h2>

    <form action="" method="post">
        <label for="query">Entrez votre requête sous cette forme: GET#quelque_chose</label>
	<p>Petit indice : OWASP 2021</p>
        <input type="text" name="query" required>
        <button type="submit" name="submit">Interroger la BDD</button>
    </form>

    <?php
    if ($errorMessage) {
        echo '<p class="error-message">' . $errorMessage . '</p>';
    }
    ?>
</div>

</body>
</html>
