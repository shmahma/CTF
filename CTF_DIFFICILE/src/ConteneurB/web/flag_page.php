<?php
// Assurez-vous que l'utilisateur est authentifié
session_start();
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flag Page</title>
</head>
<body>
    <h1>Flag Page</h1>
    <p>FLAG{63 74 66 3a 61 7a 65 72 74 79}</p>
</body>
</html>
