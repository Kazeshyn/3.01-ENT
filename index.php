<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style_connect.css">
        <link rel="icon" type="image/x-icon" href="./img/logoUniversite2.png">
        <title>Connexion - ENT</title>

        <style>
            .IdMdp.focus, .IdMdp:hover {
                border: 2px solid #3498db;
            }
            input:focus {
                outline: none;
            }
            #connect:hover {
                background-color: #FFF;
                color: #3498db;
                border: 2px solid #3498db;
                padding: 7px 13px;
            }
            a:hover {
                color: #3498db;
            }
        </style>
    </head>
    <body>
        <main>
            <img src="./img/logoUniversite.png" alt="Université Gustave Eiffel">
            <h1>Bienvenue sur <br>le portail de connexion !</h1>
            <form action="traitelogin.php">
                <div class="IdMdp" id="divLogin">
                    <label for="login">Mon Identifiant :</label>
                    <input class="input" type="text" name="login" id="login" required />
                </div>
                <?php 
                    if (isset($_GET["err"]) && $_GET["err"]=="login") { echo "ATTENTION MAUVAIS LOGIN";}
                ?>
                <div class="IdMdp" id="divMdp">
                    <label for="mot_de_passe">Mot de Passe :</label>
                    <input class="input" type="password" name="mot_de_passe" id="mot_de_passe" required />
                </div>
                <a href="mdpoublie.html">Mot de passe oublié ?</a>
                <br><input id="connect" type="submit" value="Connexion"></input>
            </form>
            
        </main>
        
    </body>

    <script>
            // Fonction pour ajouter la classe focus à la div parent lorsqu'un enfant est focus
            function addFocusClass(event) {
                const parentDiv = event.target.parentElement;
                parentDiv.classList.add('focus');
            }

            // Fonction pour retirer la classe focus de la div parent lorsque le focus est perdu
            function removeFocusClass(event) {
                const parentDiv = event.target.parentElement;
                parentDiv.classList.remove('focus');
            }

            // Ajout des gestionnaires d'événements pour le focus et le blur
            document.getElementById('login').addEventListener('focus', addFocusClass);
            document.getElementById('login').addEventListener('blur', removeFocusClass);
            document.getElementById('mot_de_passe').addEventListener('focus', addFocusClass);
            document.getElementById('mot_de_passe').addEventListener('blur', removeFocusClass);
        </script>
</html>