<!DOCTYPE html>
<?php 
    include 'connexion.php';
    session_start();
    
    $isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'];

    $todayDate = date("Y-m-d");

?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style_footerheader.css">
        <link rel="stylesheet" href="style_resto.css">
        <script src="script_resto.js"></script>
        
        <title>Restauration - ENT</title>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Sélectionnez le sélecteur par son ID
                var filtreSelect = document.getElementById('filtre');

                // Ajoutez un gestionnaire d'événements pour mettre à jour le libellé
                filtreSelect.addEventListener('change', function () {
                    var selectedOption = filtreSelect.options[filtreSelect.selectedIndex];
                    filtreSelect.options[0].text = selectedOption.text;
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
            <nav class="SecondNav">
                <h2>Menus</h2>
                <?php if ($isAdmin): ?>
                    <a id="addMenu" href="addMenu.php">Ajouter un menu</a>
                <?php endif; ?>
                <?php 
                    $requete_menu = "SELECT * FROM menu WHERE date_menu = '$todayDate'";
                    $stmt_menu = $pdo->prepare($requete_menu);
                    $stmt_menu->execute();
                    $result_menu = $stmt_menu->fetchAll();
                    foreach($result_menu as $menu) {
                ?>
                    <div>
                        <h3><?= $menu["nom_menu"] ?></h3>
                        <ul>
                            <li><?= $menu["entree_menu"] ?></li>
                            <li><?= $menu["plat1_menu"] ?></li>
                            <li><?= $menu["plat2_menu"] ?></li>
                            <li><?= $menu["dessert_menu"] ?></li>
                        </ul>
                    </div>
                <?php } ?>
            </nav>

            <section class="sectionPrincipal">
                <h1>Lieux de restauration</h1>
                <button id="menuResto">Menus</button>

                <div class="modal" id="modal">
                    <?php 
                        
                        foreach($result_menu as $menu) {
                    ?>
                        <div>
                            <h3><?= $menu["nom_menu"] ?></h3>
                            <ul>
                                <li><?= $menu["entree_menu"] ?></li>
                                <li><?= $menu["plat1_menu"] ?></li>
                                <li><?= $menu["plat2_menu"] ?></li>
                                <li><?= $menu["dessert_menu"] ?></li>
                            </ul>
                        </div>
                    <?php } ?>
                   
                </div>
                <?php if ($isAdmin): ?>
                        <a id="addMenu add2" href="addMenu.php">Ajouter un menu</a>
                <?php endif; ?>

                <form method="get" id="filtreForm" action="restauration.php">
                    <select name="filtre" id="filtre" onchange="this.form.submit()">
                        <option value="" <?php echo ($filtre === '') ? 'selected' : ''; ?>>-- Filtrer par --</option>
                        <option value="Tous" <?php echo ($filtre === 'Tous') ? 'selected' : ''; ?>>Tous</option>
                        <option value="cafet" <?php echo ($filtre === 'cafet') ? 'selected' : ''; ?>>Cafèt</option>
                        <option value="resto" <?php echo ($filtre === 'resto') ? 'selected' : ''; ?>>Resto</option>
                    </select>
                </form>

                <section class="lieux">
                    <?php 
                        date_default_timezone_set('Europe/Paris');
                        $heureActuelle = date("H:i");

                        // Vérifier si un filtre a été sélectionné
                        $filtre = isset($_GET['filtre']) ? $_GET['filtre'] : '';

                        // Construire la requête SQL en fonction du filtre
                        $requete_resto = "SELECT nom_restaurant, TIME_FORMAT(heure_ouverture, '%H:%i') AS heure_ouverture, TIME_FORMAT(heure_fermeture, '%H:%i') AS heure_fermeture, adresse_restaurant FROM restaurant";

                        if (!empty($filtre) && $filtre !== 'Tous') {
                            $requete_resto .= " WHERE type_restaurant = :filtre";
                        }


                        $stmt_resto = $pdo->prepare($requete_resto);
                        if (!empty($filtre) && $filtre !== 'Tous') {
                            $stmt_resto->bindParam(':filtre', $filtre, PDO::PARAM_STR);
                        }
                        $stmt_resto->execute();
                        $result_resto = $stmt_resto->fetchAll();
                        foreach($result_resto as $resto) {
                            //Changer couleur de l'état en fonction de l'heure
                            $heureOuverture = $resto["heure_ouverture"];
                            $heureFermeture = $resto["heure_fermeture"];

                            $etatClass = ($heureActuelle >= $heureOuverture && $heureActuelle <= $heureFermeture) ? 'vert' : 'rouge';
                    ?>
                        <div class="resto">
                            <div class="title">
                                <div class="etat <?= $etatClass ?>"></div>
                                <h2><?= $resto["nom_restaurant"] ?></h2>
                            </div>
                            <div class="horaire">
                                <ul>
                                    <li><?= $resto["heure_ouverture"] ?></li>
                                    <li><?= $resto["heure_fermeture"] ?></li>
                                </ul>
                            </div>
                            <a href=""><?= $resto["adresse_restaurant"]?></a>
                        </div>
                    <?php } ?>

                </section>
            </section>

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
    <script src="script-burger.js"></script>
    <script>
            document.addEventListener('DOMContentLoaded', function () {
                var filtreSelect = document.getElementById('filtre');

                // Récupérer le paramètre de l'URL
                var urlParams = new URLSearchParams(window.location.search);
                var selectedFiltre = urlParams.get('filtre');

                // Si un paramètre existe, sélectionnez l'option appropriée
                if (selectedFiltre) {
                    var options = filtreSelect.options;
                    for (var i = 0; i < options.length; i++) {
                        if (options[i].value === selectedFiltre) {
                            filtreSelect.selectedIndex = i;
                            break;
                        }
                    }
                }

                // Ajouter un gestionnaire d'événements pour mettre à jour le libellé
                filtreSelect.addEventListener('change', function () {
                    var selectedOption = filtreSelect.options[filtreSelect.selectedIndex];
                    filtreSelect.options[0].text = selectedOption.text;
                });
            });
        </script>

</html>