<?php
session_start();

if (!isset($_SESSION['enigma1_solved']) || $_SESSION['enigma1_solved'] !== true) {
    header("Location: index.php");
    exit();
}

$correct_answer = "N||||||CE CONT|||NUE!"; // Remplacez par la vraie réponse

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_answer = $_POST["answer"];

    if ($user_answer === $correct_answer) {
        $_SESSION['enigma2_solved'] = true;
        header("Location: enigme3.php");
        exit();
    } else {
        $error_message = "Wrong answer. Try again!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enigma 2</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1 {
    color: #333333;
}

p {
    color: #555555;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    margin-top: 15px;
    background-color: #007BFF;
    color: #ffffff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #0056b3;
}
</style>
</head>
<body>
    <div class="container">
        <h1>Enigma 2</h1>
        <p>Here is your second challenge: c84c09c55f9b56c3736b8cba7ae63d77606b84b8603d58f4</p>
        <!-- Afficher le formulaire -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="answer">Answer:</label>
            <input type="text" id="answer" name="answer" required>
            <button type="submit" class="btn">Submit</button>
        </form>
        <?php if (isset($error_message)) : ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
