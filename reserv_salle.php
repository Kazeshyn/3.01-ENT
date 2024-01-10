<?php
include "connexion.php";
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style_footerheader.css">
    <link rel="stylesheet" href="style_reservation.css">

    <title>Réservations - ENT</title>
</head>

<body>
    <header>
        <!-- Header téléphone/tablettes -->
        <nav class="phonetabheader">
            <a href="" class="logoheader"><img class="logoheader" src="./img/logoUniversite2.png"
                    alt="Retourner à l'accueil (page actuelle)"></a>
            <div class="headergroupphone">
                <a href="" class="darkm">☀️</a>
                <img src="./img/burger_menu.png" alt="" id="button">
            </div>
        </nav>
        <!-- Modal du burger menu -->
        <div class="menu menuoff" id="menu">
            <p class="burgerprewrapper">Communication</p>
            <div class="burgerwrapper">
                <a href="" class="navlink">Mail</a>
                <a href="" class="navlink">Forum</a>
                <a href="" class="navlink">Actualité</a>
            </div>
            <a href="" class="burgerprewrapper">Restauration</a>
            <p class="burgerprewrapper">Ressources</p>
            <div class="burgerwrapper">
                <a href="" class="navlink">Bibliothèque de ressources</a>
                <a href="" class="navlink">Mes fichiers</a>
                <a href="" class="navlink">Tutoriels</a>
                <a href="" class="navlink">Réservations</a>
            </div>
            <p class="burgerprewrapper">Cours</p>
            <div class="burgerwrapper">
                <a href="" class="navlink">Cours</a>
                <a href="" class="navlink">Emploi du temps</a>
                <a href="" class="navlink">Notes</a>
                <a href="" class="navlink">Agenda</a>
            </div>
            <a href="" class="burgerprewrapper">Mon compte</a>
        </div>
        <!-- Header ordinateur -->
        <nav class="desktopheader">
            <div class="conteneur-nav">
                <label for="mobile">Afficher / Cacher le menu</label>
                <input type="checkbox" id="mobile" role="button">
                <ul>
                    <li class="deroulant align"><a href="#" class="linkcolor navlink">Communication &ensp;</a>
                        <ul class="sous">
                            <li><a href="#">Mail</a></li>
                            <li><a href="#">Forum</a></li>
                            <li><a href="#">Actualité</a></li>
                        </ul>
                    </li>
                    <li class="align"><a href="#" class="linkcolor navlink">Restauration</a></li>
                    <li class="deroulant align"><a href="#" class="linkcolor navlink">Ressources &ensp;</a>
                        <ul class="sous">
                            <li><a href="#">Bibliothèque de ressources</a></li>
                            <li><a href="#">Tutoriels</a></li>
                            <li><a href="#">Mes fichiers</a></li>
                        </ul>
                    </li>

                    <li class="align"><a href="#"><img src="./img/logoUniversite2.png" alt=""></a></li>

                    <li class="align"><a href="#" class="linkcolor navlink">Reservation</a></li>
                    <li class="deroulant align"><a href="#" class="linkcolor navlink">Cours &ensp;</a>
                        <ul class="sous">
                            <li><a href="#">Cours</a></li>
                            <li><a href="#">Emploi du temps</a></li>
                            <li><a href="#">Notes</a></li>
                            <li><a href="#">Agenda</a></li>
                        </ul>
                    </li>
                    <li class="align"><a href="#" class="linkcolor navlink">Mon compte</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="reserver">

        <h1>Reservation de salle</h1>
        <?php
        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION['id_utilisateur'])) {
            ?>
        <form action="traite-reservation-salle.php" method="POST">

        <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['id_utilisateur']; ?>">
            <label for="date_debut_m">Date de début:</label>
            <br><input type="date" name="date_debut_s" required>
            <br><label for="horaire_debut_s">Horaire de début :</label>
            <br><input type="time" name="horaire_debut_s" required>
            <label for="date_fin">Date de fin:</label>
            <br><input type="date" name="date_fin_s" required>
            <br><label for="horaire_fin_s">Horaire de fin :</label>
            <br><input type="time" name="horaire_fin_s" required>
            <br><label for="numero_salle">Numéro de salle :</label>
            <br><select name="nom_salle" required>
                <option value="">- - -</option>
                <?php


$requete = "SELECT numero_salle FROM salle";
$stmt = $pdo->prepare($requete);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<option value='{$row['numero_salle']}'>{$row['numero_salle']}</option>";
}
?>

            </select>
            <br><input id="reserverSal" type="submit" value="Réserver la salle">
        </form>
        <?php
        } else {
            echo "Erreur : utilisateur non connecté.";
        }
        ?>


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
    <script src="script-burger.js"></script>
</body>

</html>