<?php
session_start();


$correct_answer = "G0000000D W000000RK!"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_answer = $_POST["answer"];

    if ($user_answer === $correct_answer) {
        $_SESSION['enigma1_solved'] = true;
        header("Location: enigme2.php");
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
    <title>Enigma 1</title>
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
        <h1>Enigma 1</h1>
        <p>Here is your first challenge: A0000000X Q000000LE!</p>
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
