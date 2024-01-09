<!DOCTYPE html>
<?php 
    session_start();
    include "connexion.php";

    $isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'];


    $_SESSION['previous_url'] = $_SERVER['HTTP_REFERER'];

    // récupére l'id de l'article depuis l'url
    $id_post=$_GET["id"];

    $requete="SELECT * FROM post WHERE id_post = $id_post";
    $stmt=$db->prepare($requete);
    $stmt->execute();
    $result=$stmt->fetch();

    //récupére les commentaires de l'article
    $requete_comment="SELECT * FROM commentaire WHERE id_post=$id_post ORDER BY date_commentaire DESC";
    $stmt_comment=$db->prepare($requete_comment);
    $stmt_comment->execute();
    $result_comment=$stmt_comment->fetchAll();
?>


<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style_footerheader.css">
        <link rel="stylesheet" href="style_post.css">
        <title><?= $result["titre_post"]?> - Blog</title>
    </head>
    <body>
    <header>
            <!-- Header téléphone/tablettes -->
            <nav class="phonetabheader">
                <a href="accueil.php" class="logoheader"><img class="logoheader" src="./img/logoUniversite2.png"
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
                    <a href="actu.php" class="navlink">Actualité</a>
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
                                <li><a href="actu.php">Actualité</a></li>
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
            
                        <li class="align"><a href="accueil.php"><img src="./img/logoUniversite2.png" alt=""></a></li>
            
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

        <main>
            <p><a id="retour" href="forum.php">Retour au forum</a></p>

            <article>
            <?php 
                // Récupérer les informations de l'utilisateur associé au post principal
                $id_utilisateur_post = $result["id_utilisateur"];
                $requete_utilisateur_post = "SELECT * FROM utilisateur WHERE id_utilisateur = $id_utilisateur_post";
                $stmt_utilisateur_post = $db->prepare($requete_utilisateur_post);
                $stmt_utilisateur_post->execute();
                $info_user_post = $stmt_utilisateur_post->fetch();
            
            ?>
                <div class="compte">
                    <img src="<?= $info_user_post["url_pp"] ?>" alt="">
                    <h3><?= $info_user_post["nom"] ?>  <?= $info_user_post["prenom"] ?></h3> 
                </div> 
                <h1><?= $result["titre_post"]?></h1>
                <p class="content"><i><?= $result["date_post"] ?></i>
                <br>
                <br><?= $result["contenu_post"]; ?></p>
            </article>

            <div class="commentaire">
                <h2>Commentaires </h2>
                <!-- Formulaire pour ajouter un commentaire -->
                <div class="addComment">
                    <h3>Ajouter un commentaire :</h3>
                    <form action="traitecommentaire.php" method="post">
                        <input type="hidden" name="id_post" value="<?= $result["id_post"] ?>">
                        <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['id_utilisateur'];?>">
                        <textarea name="contenu" placeholder="Écrivez un commentaire..." required></textarea>
                        <input type="submit" value="Ajouter le commentaire">
                    </form>
                </div>
                
                
                <div id="allComment">
                <?php 
                    foreach($result_comment as $comment){
                        $id_utilisateur = $comment["id_utilisateur"];

                        $requete_utilisateur = "SELECT * FROM utilisateur WHERE id_utilisateur = $id_utilisateur";
                        $stmt_utilisateur = $db->prepare($requete_utilisateur);
                        $stmt_utilisateur->execute();
                        $info_user = $stmt_utilisateur->fetch();
                        
                ?>
                    <div class="comment">
                        <div class="compte">
                            <img src="<?= $info_user["url_pp"] ?>" alt="">
                            <h3><?= $info_user["nom"] ?>  <?= $info_user["prenom"] ?></h3> 
                        </div> 
                        <p><i>(<?= $comment["date_commentaire"] ?>)</i>
                        <br><?= $comment["contenu_commentaire"] ?></p>
                        <?php if ($isAdmin): ?>
                            <form action="supComment.php" method="post">
                                <input type="hidden" name="id_commentaire" value="<?= $comment["id_commentaire"] ?>">
                                <input class="supButton" type="submit" value="Supprimer">
                            </form>
                        <?php endif; ?>
                    </div>
                <?php } ?>
                </div>
            </div>
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