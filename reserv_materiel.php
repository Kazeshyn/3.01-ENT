<?php
include "connexion.php";
session_start();
$isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'];
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
    <link rel="icon" type="image/x-icon" href="./img/logoUniversite2.png">

    <title>Réservations - ENT</title>
</head>

<body>
   
    <main class="reserver">
 


    <h1>Réservation de matériel</h1>
    <?php if ($isAdmin): ?>
                <a id="seeReserv" href="seeReserv_mat.php">Voir toutes les réservations</a>
    <?php endif; ?>
    <?php
        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION['id_utilisateur'])) {
            ?>

<form action="traite-reservation-materiel.php" method="POST">
        
    <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['id_utilisateur']; ?>">

    <label for="date_debut_m">Date de début:</label>
    <br><input type="date" name="date_debut_m" required>
    <br><label for="horaire_debut_m">Horaire de début :</label>
    <br><input type="time" name="horaire_debut_m" required>
    <label for="date_fin">Date de fin:</label>
    <br><input type="date" name="date_fin_m" required>
    <br><label for="horaire_fin_m">Horaire de fin :</label>
    <br><input type="time" name="horaire_fin_m" required>
    <br><label for="nom_materiel">Matériel :</label>
    <br>
    <select name="nom_materiel" required>
        <option value="">- - -</option>
        <?php
        $requete = "SELECT nom_materiel FROM materiel";
        $stmt = $pdo->prepare($requete);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='{$row['nom_materiel']}'>{$row['nom_materiel']}</option>";
        }
        ?>
    </select>

    <br><input id="reserverMat" type="submit" value="Réserver le matériel">
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
            <a href="https://www.univ-gustave-eiffel.fr" class="linkfooter" target="_blank">Site de l'université</a>
            <a href="https://lcs.univ-gustave-eiffel.fr/vie-etudiante/reseaux-detudiants/reseaux-anciens-etudiants" class="linkfooter" target="_blank">Réseau des anciens</a>
            <a href="https://www.facebook.com/MDEUGE/?locale=fr_FR" class="linkfooter" target="_blank">Maison des étudiants</a>
        </div>
        <div class="footwrapper">
            <a href="mentionLegales.html" class="linkfooter">Mentions légales</a>
            <a href="plansite.html" class="linkfooter">Plan du site</a>
            <a href="apropos.html" class="linkfooter">A propos</a>
        </div>
    </footer>


    <script src="script-burger.js"></script>
</body>

</html>