<?php

$host = "mysql";
$dbname = "my-wonderful-website";
$charset = "utf8";
$port = "3306";

$username = "";
$password = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=$charset;port=$port",
            "root",
            "super-secret-password"
        );

        $query = "SELECT * FROM Persons WHERE username = '$username' AND password= '$password'";
        $user = $pdo->query($query)->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            header("Location: bdd.php");
            exit();
        } else {
            $errorMessage = "Nom d'utilisateur ou mot de passe incorrect";
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
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            margin-top: 50px;
            background-color: #f2f2f2;
            border-radius: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
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

        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Connexion</h2>
    <form action="" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" required>

        <button type="submit" name="submit">Se connecter</button>
    </form>

    <?php
    if ($errorMessage) {
        echo '<p class="error-message">' . $errorMessage . '</p>';
    }
    ?>
</div>

</body>
</html>
