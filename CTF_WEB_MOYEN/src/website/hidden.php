<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Blog de John</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        header {
            text-align: center;
            background-color: #f0f0f0;
            padding: 10px;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
        }

        h1, h2 {
            color: #333;
        }
    </style>
</head>

<body>

    <header>
        <h1>Blog de John</h1>
    </header>

    <section>
        <h2>À propos de moi</h2>
        <p>Nom: John</p>
        <p>Âge: 29 ans</p>
        <p>Date de naissance: 23/09/1995</p>
        <p>Animal de companie: Loup (Fantôme)</p>
    </section>

    <section>
        <h2>Tutoriel de base en CSS et HTML</h2>
        
        <h3>Introduction</h3>
        <p>Bienvenue dans ce tutoriel de base qui vous aidera à démarrer avec le CSS et le HTML.</p>
    
        <h3>1. Structure de base en HTML</h3>
        <p>Commencez par définir la structure de base de votre page HTML :</p>
        <pre>
            <code>
                &lt;!DOCTYPE html&gt;
                &lt;html lang="fr"&gt;
                &lt;head&gt;
                    &lt;meta charset="UTF-8"&gt;
                    &lt;meta name="viewport" content="width=device-width, initial-scale=1.0"&gt;
                    &lt;title&gt;Votre titre&lt;/title&gt;
                    &lt;link rel="stylesheet" href="styles.css"&gt; 
                &lt;/head&gt;
                &lt;body&gt;
                    &lt;header&gt;
                        &lt;h1&gt;Titre de votre site&lt;/h1&gt;
                    &lt;/header&gt;
                    &lt;section&gt;
                        &lt;h2&gt;Contenu principal&lt;/h2&gt;
                        &lt;p&gt;Votre contenu ici...&lt;/p&gt;
                    &lt;/section&gt;
                    &lt;footer&gt;
                        &lt;p&gt;&amp;copy; 2023 Votre Nom. Tous droits réservés. | 7=28Lz:?8x?%96}@CE9N&lt;/p&gt;
                    &lt;/footer&gt;
                &lt;/body&gt;
                &lt;/html&gt;
            </code>
        </pre>
    
        <h3>2. Ajout de styles avec CSS</h3>
        <p>Créez un fichier CSS séparé (styles.css) pour styliser votre page :</p>
        <pre>
            <code>
                body {
                    font-family: Arial, sans-serif;
                    line-height: 1.6;
                    margin: 20px;
                }
    
                header {
                    text-align: center;
                    background-color: #f0f0f0;
                    padding: 10px;
                }
    
                section {
                    max-width: 800px;
                    margin: 20px auto;
                }
    
                h1, h2 {
                    color: #333;
                }
            </code>
        </pre>
    
        <h3>3. Expérimentation avec les styles</h3>
        <p>Expérimentation avec les styles :</p>
        <?php
        echo "<pre><code>
            a. Changement de couleurs :
            Dans votre fichier \"styles.css\", essayez de changer la couleur du texte, de l'arrière-plan ou des bordures. Par exemple :
            
            css
            
            body {
                background-color: #f0f0f0;
                color: #333;
            }
            
            header {
                background-color: #007bff;
                color: white;
            }
            
            Dans cet exemple, le fond de votre page (body) sera gris clair (#f0f0f0), et l'arrière-plan de votre en-tête (header) sera bleu (#007bff).
            
            b. Modification de la taille de la police :
            Expérimentez avec la taille de la police pour rendre votre texte plus grand ou plus petit. Ajoutez ceci à votre fichier \"styles.css\" :
            
            css
            
            body {
                font-size: 16px;
            }
            
            header {
                font-size: 24px;
            }
            
            Ici, le texte du corps aura une taille de police de 16 pixels, tandis que le texte de l'en-tête sera plus grand avec une taille de police de 24 pixels.
            
            c. Ajustement des marges et des espacements :
            Jouez avec les marges pour contrôler l'espace autour de vos éléments. Par exemple :
            
            css
            
            section {
                margin-top: 30px;
                margin-bottom: 20px;
            }
            
            footer {
                margin-top: 50px;
            }
            
            Ces propriétés ajoutent de l'espace en haut de la section, en bas de la section et au-dessus du pied de page.
            
            d. Utilisation de polices personnalisées :
            Si vous avez une police personnalisée, vous pouvez l'utiliser en l'important dans votre fichier CSS. Assurez-vous d'avoir le fichier de police (.woff ou .woff2) disponible et ajoutez ceci à votre fichier \"styles.css\" :
            
            css
            
            body {
                font-family: 'VotrePolicePersonnalisee', sans-serif;
            }
            
            N'oubliez pas de remplacer 'VotrePolicePersonnalisee' par le nom réel de votre police.
            
            e. Effets de survol :
            Ajoutez des effets de survol à vos liens pour une interaction utilisateur. Par exemple :
            
            css
            
            a:hover {
                color: #ff4500; /* changement de couleur lors du survol */
                text-decoration: underline; /* soulignement lors du survol */
            }
            
            Ces exemples vous montrent comment expérimenter avec différentes propriétés CSS pour personnaliser l'apparence de votre site. Continuez à jouer avec ces styles et explorez d'autres propriétés CSS pour affiner davantage l'esthétique de votre page web.
        </code></pre>";
        ?>


    </section>

    


    <footer>
        <img src="hidden.png" alt="Image cachée" width="50" height="20" style="display: block; margin: 10px 0 10px 1px;">
        <p>&copy; 2023 Blog de John. Tous droits réservés.</p>
    </footer>

</body>

</html>
