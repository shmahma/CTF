<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $correctUsername = 'john';
    $correctPassword = 'Kikawa_9123';

    if ($username === $correctUsername && $password === $correctPassword) {
        $_SESSION['authenticated'] = true;
        header('Location: welcome.php');
        exit();
    } else {
        echo 'Nom d\'utilisateur ou mot de passe incorrect.';
    }
} else {
    header('Location: login.php');
}
?>
