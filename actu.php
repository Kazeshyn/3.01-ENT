<!DOCTYPE html>

<?php
    include 'connexion.php';
    session_start();

    $isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'];

        // Vérifier si l'utilisateur est connecté ou non
        if (isset($_SESSION['login'])) {
            // Utilisateur connecté
            $nom_utilisateur = $_SESSION['login'];
            $bouton_texte = "Se déconnecter";
            $lien_deconnexion = "logout.php";
        } else {
            // Utilisateur non connecté
            $bouton_texte = "Se connecter";
            $lien_deconnexion = "login.php";
        }

    $requete = "SELECT * FROM actualite ORDER BY date_actu DESC";

?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style_footerheader.css">
        <link rel="stylesheet" href="style_actu.css">
        <link rel="icon" type="image/x-icon" href="./img/logoUniversite2.png">
        <style>
            article img {
                object-fit: cover;
            }
            .supButton {
                background-color: #FFF;
                border: red 2px solid;
                color: rgb(233, 1, 1);
                padding: 5px 10px;
                border-radius: 5px;
                margin-bottom: 5px;
                margin-top: 5px;
            }
        </style>
        <title>Actualités - ENT</title>

        <script src="script-burger.js" defer></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Sélectionnez le sélecteur par son ID
                var themeSelect = document.getElementById('theme');

                // Ajoutez un gestionnaire d'événements pour mettre à jour le libellé
                themeSelect.addEventListener('change', function () {
                    var selectedOption = themeSelect.options[themeSelect.selectedIndex];
                    themeSelect.options[0].text = selectedOption.text;
                });
            });
        </script>
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
                    <li class="deroulant align"><a href="" class="linkcolor navlink">Cours &ensp;</a>
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
    <h1>Actualités</h1>
    <!-- Ajout le bouton si l'admin est connecté -->
    <section class="option">
        <?php if ($isAdmin): ?>
            <a id="addActu" href="addActu.php">Ajouter une actu</a>
        <?php endif; ?>
        <?php $theme = isset($_GET['theme']) ? $_GET['theme'] : ''; ?>

        <form  method="get" id="themeForm" action="actu.php">
            <select name="theme" id="theme" onchange="this.form.submit()">
                <option value="" <?php echo ($theme === '') ? 'selected' : ''; ?>>--- Filtrer par ---</option>
                <option value="Tous" <?php echo ($theme === 'Tous') ? 'selected' : ''; ?>>Tous</option>
                <option value="sport" <?php echo ($theme === 'sport') ? 'selected' : ''; ?>>Sport</option>
                <option value="repas" <?php echo ($theme === 'repas') ? 'selected' : ''; ?>>Repas</option>
            </select>
        </form>

    </section>

    <section>
        <?php
            // Vérifier si un filtre a été sélectionné

            // Construire la requête SQL en fonction du filtre
            $requete = "SELECT * FROM actualite";
            if (!empty($theme) && $theme !== 'Tous') {
                $requete .= " WHERE theme_actu = :theme";
            }
            $requete .= " ORDER BY date_actu DESC";

            // Préparer et exécuter la requête
            $stmt = $pdo->prepare($requete);
            if (!empty($theme) && $theme !== 'Tous') {
                $stmt->bindParam(':theme', $theme, PDO::PARAM_STR);
            }
            $stmt->execute();
            $result = $stmt->fetchAll();

            // Afficher les actualités filtrées
            foreach ($result as $actu) { 
        ?>
            <article>
                <img src="<?= $actu["url_actu"] ?>" alt="">
                <div class="text">
                    <h2><?= $actu["titre_actu"] ?></h2>
                    <p><i><?= $actu["date_actu"] ?></i></p>
                    <p><?= $actu["contenu_actu"] ?> </p>
                    <?php if ($isAdmin): ?>
                        <form action="supActu.php" method="post">
                            <input type="hidden" name="id_actu" value="<?= $actu["id_actu"] ?>">
                            <input class="supButton" type="submit" value="Supprimer">
                        </form>
                    <?php endif; ?>
                </div>
            </article>
        <?php } ?>
    </section>
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
    </body>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var themeSelect = document.getElementById('theme');

                // Récupérer le paramètre de l'URL
                var urlParams = new URLSearchParams(window.location.search);
                var selectedTheme = urlParams.get('theme');

                // Si un paramètre existe, sélectionnez l'option appropriée
                if (selectedTheme) {
                    var options = themeSelect.options;
                    for (var i = 0; i < options.length; i++) {
                        if (options[i].value === selectedTheme) {
                            themeSelect.selectedIndex = i;
                            break;
                        }
                    }
                }

                // Ajouter un gestionnaire d'événements pour mettre à jour le libellé
                themeSelect.addEventListener('change', function () {
                    var selectedOption = themeSelect.options[themeSelect.selectedIndex];
                    themeSelect.options[0].text = selectedOption.text;
                });
            });
        </script>

</html>