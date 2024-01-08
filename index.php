<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style_connect.css">
        <title>Connexion - ENT</title>
    </head>
    <body>
        <main>
            <img src="./img/logoUniversite.png" alt="Université Gustave Eiffel">
            <h1>Bienvenue sur <br>le portail de connexion !</h1>
            <form action="traitelogin.php">
                <div class="IdMdp">
                    <label for="login">Mon Identifiant :</label>
                    <input class="input" type="text" name="login" id="login" required />
                </div>
                <?php 
                    if (isset($_GET["err"]) && $_GET["err"]=="login") { echo "ATTENTION MAUVAIS LOGIN";}
                ?>
                <div class="IdMdp">
                    <label for="mot_de_passe">Mot de Passe :</label>
                    <input class="input" type="text" name="mot_de_passe" id="mot_de_passe" required />
                </div>
                <a href="mdpoublie.html">Mot de passe oublié ?</a>
                <br><input id="connect" type="submit" value="Connexion"></input>
            </form>
            
        </main>
        
    </body>
</html>