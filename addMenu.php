<!DOCTYPE html>

<?php
    session_start();
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style_footerheader.css">
        <link rel="stylesheet" href="style_addMenu.css">
        <title>Ajouter un menu à l'ENT</title>
    </head>

    <body>
    <header>
        <!-- Header téléphone/tablettes -->
        <nav class="phonetabheader">
            <a href="./accueil.php" class="logoheader"><img class="logoheader" src="./img/logoUniversite2.png" alt="Retourner à l'accueil (page actuelle)"></a>
            <div class="headergroupphone">
                <a href="" class="darkm">☀️</a>
                <img src="./img/burger_menu.png" alt="" id="button">
            </div>
        </nav>
        <!-- Modal du burger menu -->
        <div class="menu menuoff" id="menu">
            <p class="burgerprewrapper">Communication</p>
            <div class="burgerwrapper">
                <a href="https://www.partage.univ-eiffel.fr/mail" class="navlink">Mail</a>
                <a href="./forum.php" class="navlink">Forum</a>
                <a href="./actu.php" class="navlink">Actualité</a>
            </div>
            <a href="restauration.php" class="burgerprewrapper">Restauration</a>
            <p class="burgerprewrapper">Ressources</p>
            <div class="burgerwrapper">
                <a href="https://bu.univ-gustave-eiffel.fr/collections/ressources-electroniques/de-a-a-z/" class="navlink">Bibliothèque de ressources</a>
                <a href="https://etudiant.u-pem.fr/ent-services.php" class="navlink">Mes fichiers</a>
                <a href="" class="navlink">Tutoriels</a>
                <a href="./reservation.php" class="navlink">Réservations</a>
            </div>
            <p class="burgerprewrapper">Cours</p>
            <div class="burgerwrapper">
                <a href="https://elearning.univ-eiffel.fr/my/" class="navlink">Cours</a>
                <a href="https://edt.univ-eiffel.fr/direct/index.jsp?login=visuedt&password=visuedt" class="navlink">Emploi du temps</a>
                <a href="./note.php" class="navlink">Notes</a>
                <a href="https://elearning.univ-eiffel.fr/calendar/view.php?view=upcoming" class="navlink">Agenda</a>
            </div>
            <a href="./compte.php" class="burgerprewrapper">Mon compte</a>
        </div>
        <!-- Header ordinateur -->
        <nav class="desktopheader">
            <div class="conteneur-nav">
                <label for="mobile">Afficher / Cacher le menu</label>
                <input type="checkbox" id="mobile" role="button">
                <ul>
                    <li class="deroulant align"><a href="#" class="linkcolor navlink">Communication &ensp;</a>
                        <ul class="sous">
                            <li><a href="https://www.partage.univ-eiffel.fr/mail">Mail</a></li>
                            <li><a href="./forum.php">Forum</a></li>
                            <li><a href="./actu.php">Actualité</a></li>
                        </ul>
                    </li>
                    <li class="align"><a href="restauration.php" class="linkcolor navlink">Restauration</a></li>
                    <li class="deroulant align"><a href="#" class="linkcolor navlink">Ressources &ensp;</a>
                        <ul class="sous">
                            <li><a href="https://bu.univ-gustave-eiffel.fr/collections/ressources-electroniques/de-a-a-z/">Bibliothèque de ressources</a></li>
                            <li><a href="#">Tutoriels</a></li>
                            <li><a href="https://etudiant.u-pem.fr/ent-services.php">Mes fichiers</a></li>
                        </ul>
                    </li>

                    <li class="align"><a href="./accueil.php"><img src="./img/logoUniversite2.png" alt=""></a></li>

                    <li class="align"><a href="#" class="linkcolor navlink">Reservation</a></li>
                    <li class="deroulant align"><a href="#" class="linkcolor navlink">Cours &ensp;</a>
                        <ul class="sous">
                            <li><a href="https://elearning.univ-eiffel.fr/my/">Cours</a></li>
                            <li><a href="https://edt.univ-eiffel.fr/direct/index.jsp?login=visuedt&password=visuedt">Emploi du temps</a></li>
                            <li><a href="./note.php">Notes</a></li>
                            <li><a href="https://elearning.univ-eiffel.fr/calendar/view.php?view=upcoming">Agenda</a></li>
                        </ul>
                    </li>
                    <li class="align"><a href="./compte.php" class="linkcolor navlink">Mon compte</a></li>
                </ul>
            </div>
        </nav>
    </header>

        <main>
            <p><a id="retour" href="restauration.php">Retour à la page restauration</a></p>

            <h1>Ajouter un menu !</h1>
            <form action="traiteMenu.php" method="post">
                
                <label for="nom">Nom du Menu</label>
                <br><input id="nom" type=text name="nom"> 
                <br><label for="entree">Entrée :</label>
                <br><input type="text" id="entree" name="entree" required></input>
                <br><label for="plat1">Plat 1 :</label>
                <br><input type="text" id="plat1" name="plat1" required></input>
                <br><label for="plat2">Plat 2 :</label>
                <br><input type="text" id="plat2" name="plat2" required></input>
                <br><label for="dessert">Dessert :</label>
                <br><input type="text" id="dessert" name="dessert" required></input>
                <br><label for="date">Date :</label>
                <br><input id="date" type=date name="date" required>
                <br><input id="submit" type=submit value= "OK">
            </form>
        </main>
        <footer>
            <a href="" class="logoheader"><img src="./img/logoUniversite2.png" alt="" class="logoheader"></a>
            <div class="footwrapper">
                <a href="" class="linkfooter">Site de l'université</a>
                <a href="" class="linkfooter">Réseau des anciens</a>
                <a href="" class="linkfooter">Maison des étudiants</a>
            </div>
            <div class="footwrapper">
                <a href="" class="linkfooter">Mentions légales</a>
                <a href="" class="linkfooter">Plan du site</a>
                <a href="" class="linkfooter">A propos</a>
            </div>
        </footer>
    </body>
</html>