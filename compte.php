<?php
session_start();
include "connexion.php"; // Assurez-vous que vous incluez le fichier de connexion à votre base de données

// Vérifiez si l'utilisateur est connecté
if (isset($_SESSION["login"])) {
    // Utilisez la valeur de la session "login" pour récupérer les informations de l'utilisateur depuis la base de données
    $login = $_SESSION["login"];

    // Préparez et exécutez la requête SQL
    $requete = "SELECT nom,age, prenom, adresse, formation, numero_etudiant, url_pp, info_generales FROM utilisateur WHERE login=:login";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->execute();

    // Récupérez les données de l'utilisateur
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte</title>
    <link rel="stylesheet" href="style_compte.css">
    <link rel="stylesheet" href="style_footerheader.css">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/
    <link rel=" preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="./img/logoUniversite2.png">



</head>

<body>
 
<header>
            <!-- Header téléphone/tablettes -->
            <nav class="phonetabheader">
                <a href="./accueil.php" class="logoheader"><img class="logoheader" src="./img/logoUniversite2.png" alt="Retourner à l'accueil (page actuelle)"></a>
                <div class="headergroupphone">
                    <a href="./pasCree.html" class="darkm">☀️</a>
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
                <a href="" class="burgerprewrapper">Restauration</a>
                <p class="burgerprewrapper">Ressources</p>
                <div class="burgerwrapper">
                    <a href="https://bu.univ-gustave-eiffel.fr/collections/ressources-electroniques/de-a-a-z/" class="navlink">Bibliothèque de ressources</a>
                    <a href="https://etudiant.u-pem.fr/ent-services.php" class="navlink">Mes fichiers</a>
                    <a href="./pasCree.html" class="navlink">Tutoriels</a>
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
                        <li class="align"><a href="./restauration.php" class="linkcolor navlink">Restauration</a></li>
                        <li class="deroulant align"><a href="#" class="linkcolor navlink">Ressources &ensp;</a>
                            <ul class="sous">
                                <li><a href="https://bu.univ-gustave-eiffel.fr/collections/ressources-electroniques/de-a-a-z/">Bibliothèque de ressources</a></li>
                                <li><a href="./pasCree.html">Tutoriels</a></li>
                                <li><a href="https://etudiant.u-pem.fr/ent-services.php">Mes fichiers</a></li>
                            </ul>
                        </li>
    
                        <li class="align"><a href="./accueil.php"><img src="./img/logoUniversite2.png" alt=""></a></li>
    
                        <li class="align"><a href="./reservation.php" class="linkcolor navlink">Reservation</a></li>
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
        <?php

if (isset($_SESSION["login"])) {
    echo "<h2>Bonjour <i><strong>{$_SESSION["login"]}</strong></i> bienvenu sur ta page de profil !<BR></h2>";
}

?>



        <div class="gauche">

            <div>
                <div>

                    <img src="<?php echo $result["url_pp"]; ?>" alt="image-modifiable" class="profil">
                    <h1 class="nom">
                        <?php
if (isset($result)) {
    echo '<h1 class="nom">' . $result['nom'] . ' - ' . $result['prenom'] . '</h1>';
    
}
?> </h1>

                </div>
                <div class="bouton1">
                    <a href="deconnexion.php" class="bouton">
                        <img src="./img/Deconnexion.svg" alt="" class="deconnexion">Déconnexion
                    </a>
                </div>



                <div class="boite-liste">

                    <?php
                    if (isset($result)) {
                        echo "<ul>";
                        echo "<li>{$result['age']} ans </li>";
                        echo "<li>{$result['adresse']}</li>";
                        echo "<li>{$result['formation']}</li>";
                        echo "<li>N°{$result['numero_etudiant']}</li>";
                        echo "</ul>";
                    }
                    ?>


                </div>
                <div class="bouton2">
                    <a href="deconnexion.php" class="bouton"><img src="./img/Deconnexion.svg" alt=""
                            class="deconnexion">Déconnexion</a>
                </div>

            </div>
            <div class="contenu-info">
                <?php
if (isset($result)) {
    echo '<h1 class="nom2">' . $result['nom'] . ' - ' . $result['prenom'] . '</h1>';
    
}
?>




                <?php
if (isset($result)) {
    echo "<h1 class='info-gene'>Informations générales</h1>";
    echo "<p>{$result['info_generales']}</p>";
}



?>
                <div class="ajouter">Modifier</div>

                <div class="custom-model-main">
                    <div class="custom-model-inner">

                        <div class="custom-model-wrap">
                            <div class="close-btn">×</div>
                            <form method="post" action="traite-compte.php" id="form-infos">
                                <div class="pop-up-content-wrap">
                                    <label for="infos">
                                        <h2>Modifier vos informations générales </h2><br>
                                        <p>En tant qu'étudiant, vous pouvez modifier votre profil et rentrer les
                                            informations nécessaires à votre parcours. Ou écrire une simple description
                                            qui
                                            vous caractérise. Ces informations seront traitées par notre service interne
                                            et
                                            directement enregistrées dans notre base de données.
                                            A vos claviers !</p>
                                    </label>
                                    <br>
                                    <br>

                                    <textarea id="infos" name="infos" rows="5"
                                        cols="70">Rentrer les informations...</textarea>
                                    <br>
                                    <input type="submit" value="Envoyer" class="bouton-envoyer-infos" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>




                <br>




            </div>



    </main>
    <footer>
       
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(function() {
        $('.ajouter').on('click', function() {
            $('.custom-model-main').addClass('model-open');
        });
        $('.close-btn, .bg-overlay').click(function() {
            $('.custom-model-main').removeClass('model-open');
        });
    });
    </script>
    <script src="script-burger.js" defer></script>
</body>

</html>