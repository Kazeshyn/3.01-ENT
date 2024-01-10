<!DOCTYPE html>
<?php
    include 'connexion.php';
    session_start();

    $isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'];
    
    $id_utilisateur_connecte = isset($_SESSION['id_utilisateur']) ? $_SESSION['id_utilisateur'] : null;


    $requete = "SELECT * FROM post ORDER BY date_post DESC";
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style_footerheader.css">
        <link rel="stylesheet" href="style_forum.css">
        <title>Forum - ENT</title>

        <script src="script-burger.js" defer></script>
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

            <h1>Forum </h1>
            <section class="option">
                <div class="myoption">
                    <a class="add" href="addPost.php">+</a>
                    <a id="mypost" href="?filtre=MesPosts">Mes posts</a>
                </div>
                <form method="get" id="filtreForm" action="forum.php">
                    <select name="filtre" id="filtre" onchange="this.form.submit()">
                        <option value="" <?php echo ($filtre === '') ? 'selected' : ''; ?>>-- Filtrer par --</option>
                        <option value="Tous" <?php echo ($filtre === 'Tous') ? 'selected' : ''; ?>>Tous</option>
                        <option value="cours" <?php echo ($filtre === 'cours') ? 'selected' : ''; ?>>Cours</option>
                        <option value="sortie" <?php echo ($filtre === 'sortie') ? 'selected' : ''; ?>>Sortie</option>
                        <option value="tuto" <?php echo ($filtre === 'tuto') ? 'selected' : ''; ?>>Tuto</option>
                        <option value="sport" <?php echo ($filtre === 'sport') ? 'selected' : ''; ?>>Sport</option>
                        <option value="repas" <?php echo ($filtre === 'repas') ? 'selected' : ''; ?>>Repas</option>
                    </select>
                </form>
            </section>

            <section class="article">
                <?php 
                    // Vérifier si un filtre a été sélectionné
                    $filtre = isset($_GET['filtre']) ? $_GET['filtre'] : '';

                    // Construire la requête SQL en fonction du filtre et de l'utilisateur connecté
                    $requete = "SELECT * FROM post";

                    if (!empty($filtre) && $filtre !== 'Tous') {
                        if ($filtre === 'MesPosts' && !empty($id_utilisateur_connecte)) {
                            // Filtre MesPosts avec utilisateur connecté
                            $requete .= " WHERE id_utilisateur = :id_utilisateur";
                        } else {
                            // Autres filtres
                            $requete .= " WHERE categorie_post = :filtre";
                        }
                    }

                    $requete .= " ORDER BY date_post DESC";

                    // Préparer et exécuter la requête
                    $stmt = $pdo->prepare($requete);

                    if (!empty($filtre) && $filtre !== 'Tous') {
                        if ($filtre === 'MesPosts' && !empty($id_utilisateur_connecte)) {
                            // Binder le paramètre pour MesPosts avec utilisateur connecté
                            $stmt->bindParam(':id_utilisateur', $id_utilisateur_connecte, PDO::PARAM_INT);
                        } else {
                            // Binder le paramètre pour les autres filtres
                            $stmt->bindParam(':filtre', $filtre, PDO::PARAM_STR);
                        }
                    }

                    $stmt->execute();
                    $result = $stmt->fetchAll();
                                
                    foreach($result as $post) {
                        $id_utilisateur = $post["id_utilisateur"];

                        $requete_utilisateur = "SELECT * FROM utilisateur WHERE id_utilisateur = $id_utilisateur";
                        $stmt_utilisateur = $pdo->prepare($requete_utilisateur);
                        $stmt_utilisateur->execute();
                        $info_user = $stmt_utilisateur->fetch();

                        // Limiter le contenu
                        $contenuLimite = substr($post["contenu_post"], 0, 150);
                ?>
        
                    <article>
                        <a class="linkArticle" href="post.php?id=<?= $post["id_post"] ?>">
                            <div class="compte">     
                                <img src="<?= $info_user["url_pp"] ?>" alt="">
                                <h2><?= $info_user["nom"] ?>  <?= $info_user["prenom"] ?></h2>
                            </div>
                    
                            <div class="text">
                                <h3><?= $post["titre_post"] ?></h3>
                                <p><?= $contenuLimite ?>...</p>
                                <?php if (strlen($post["contenu_post"]) > 150): ?>
                                    <a class="seeMore" href="post.php?id=<?= $post["id_post"] ?>">Lire la suite...</a>
                                <?php endif; ?>
                                <?php if ($isAdmin): ?>
                                    <form action="supPost.php" method="post">
                                        <input type="hidden" name="id_post" value="<?= $post["id_post"] ?>">
                                        <input class="supButton" type="submit" value="Supprimer">
                                    </form>
                                <?php endif; ?>
                            </div>
                        </a>
                            <div class="react">
                                <a class="comment" href="post.php?id=<?= $post["id_post"] ?>#commentaire">💬</a>
                            </div>
                        
                    </article>
                <?php  } ?>
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