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
    <title>Validation</title>
</head>
<body>
    <div class="container">
        <?php
        $flag1 = "flag{WinterIsHere}";

        if ($_POST['flag1'] == $flag1) {
            echo '<div class="success">Un mot sur les balises </div>';
            echo '<div class="info">';
            echo '<p>Les différences entre les balises HTML :</p>';
            echo '<ul>';
            echo '<li><strong>Balises ouvrantes :</strong> Les balises HTML commencent par &lt; et se terminent par &gt;. Exemple : &lt;p&gt; pour un paragraphe.</li>';
            echo '<li><strong>Balises fermantes :</strong> Certaines balises nécessitent une balise de fermeture correspondante. Exemple : &lt;/p&gt; pour fermer un paragraphe.</li>';
            echo '<li><strong>Balises auto-fermantes :</strong> Certaines balises n\'ont pas de balise de fermeture. Exemple : &lt;br&gt; pour un saut de ligne.</li>';
            echo '<li><strong>Attributs :</strong> Les balises peuvent avoir des attributs qui fournissent des informations supplémentaires. Exemple : &lt;a href="V20xNGFGb3pkRlJpYlRrelZqSm9jR1JIVmt4aFZ6VnVabEU5UFE9PQ=="&gt; pour un lien hypertexte.</li>';
            echo '<li><strong>Nesting :</strong> Les balises peuvent être imbriquées les unes dans les autres.</li>';
            echo '</ul>';

            echo '<p>Exercice :</p>';
            echo '<p>Créez une page HTML basique avec un titre, un paragraphe de texte et un lien vers une autre page.</p>';
            echo '</div>';
        } else {
            echo '<div class="error">Validation échouée. Le commentaire peut être mal orthographié, contient des informations sensibles, ou ne correspond pas à l\'éthique de notre communauté.</div>';
            echo '<div class="info">';
            echo '<p>Assurez-vous que votre commentaire respecte les normes d\'orthographe et ne contient pas d\'informations sensibles ou inappropriées.</p>';
            echo '<p>Si le problème persiste, veuillez contacter l\'administrateur du site.</p>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
