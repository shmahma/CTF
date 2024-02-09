<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification des identifiants
    if ($username === 'johnny' && $password === 'test') {
        // Identifiants corrects, définir la session comme authentifiée
        $_SESSION['authenticated'] = true;

        // Rediriger vers flag_page.php
        header('Location: flag_page.php');
        exit();
    } else {
        // Identifiants incorrects
        echo "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF Challenge</title>
</head>
<body>
    <h1>Page d'identification</h1>
    <form method="post" action="index.php">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Se connecter">
    </form>
    <img src="hidden.png" alt="Identifiants serveur ftp">
</body>
</html>
