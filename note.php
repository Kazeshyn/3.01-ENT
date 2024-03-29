<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
    <link rel="stylesheet" href="style_note.css">
    <link rel="stylesheet" href="style_footerheader.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/tpreusse/radar-chart-d3/master/src/radar-chart.css">
    <script src="http://d3js.org/d3.v3.js"></script>
    <script src="https://rawgit.com/tpreusse/radar-chart-d3/master/src/radar-chart.js"></script>
    <?php
    session_start(); // Démarrer la session
    include ('connexion.php');

    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['login'])) {
        $login = $_SESSION['login'];

        $isAdmin = isset($_SESSION['admin']) && $_SESSION['admin'];

        $sql = "SELECT nom_cours, note FROM note WHERE login = :login";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();

        $data = [];
        $courseData = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $courseName = $row['nom_cours'];
            $note = (float)$row['note'];

            // Vérifier si le cours existe déjà dans $courseData
            if (array_key_exists($courseName, $courseData)) {
                // Ajouter la note au cours existant
                $courseData[$courseName]['sum'] += $note;
                $courseData[$courseName]['count'] += 1;
            } else {
                // Créer une nouvelle entrée pour le cours
                $courseData[$courseName] = ['sum' => $note, 'count' => 1];
            }
        }

        // Construire la structure JSON
        $axesData = [];
        foreach ($courseData as $courseName => $values) {
            $average = $values['sum'] / $values['count'];

            // Ajouter un axe pour chaque cours
            $axesData[] = ['axis' => $courseName, 'value' => $average];
        }

        $json_data = json_encode([['className' => 'germany', 'axes' => $axesData]], JSON_NUMERIC_CHECK);
    } else {
        // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
        header("Location: login.php");
        exit();
    }
    ?>
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
       
    <section>
        <h1 class="titre-note">Notes</h1>
        <div class="chart-container"></div>
        <script>
            var data = <?php echo $json_data; ?>;
            RadarChart.draw(".chart-container", data);
        </script>
        <h2 class="titre-note-detail">Notes détaillées</h2>
        <div class="note-detail">
            <?php
            // Récupérer les notes de l'utilisateur connecté
            $sql_notes_utilisateur = "SELECT nom_cours, note, detail_note FROM note WHERE login = :login";
            $stmt_notes_utilisateur = $pdo->prepare($sql_notes_utilisateur);
            $stmt_notes_utilisateur->bindParam(':login', $login, PDO::PARAM_STR);
            $stmt_notes_utilisateur->execute();

            while ($row_note = $stmt_notes_utilisateur->fetch(PDO::FETCH_ASSOC)) {
                $nom_cours = $row_note['nom_cours'];
                $note_utilisateur = $row_note['note'];
                $detail_note = $row_note['detail_note'];

                // Afficher le détail de la note avant la matière
                echo "<p>$detail_note - $nom_cours - $note_utilisateur/20</p>";
            }
            ?>
        </div>
        </div>
        <?php if ($isAdmin) : ?>
            <h2 class="titre-note-detail">Insérer une note :</h1>
                <form action="traiteNote.php" method="post"> <!-- Ajout de method="post" -->
                    <label for="matiere">Matière :</label>
                    <br><select name="matiere" id="matiere">
                        <<option value="Intégration">Intégration</option>
                            <option value="C.numérique">Culture Numérique</option>
                            <option value="anglais">Anglais</option>
                            <option value="audiovisuel">Audiovisuel</option>
                            <option value="D.WEB">Developpement Web</option>
                            <option value="Graphisme">Production Graphique</option>
                            <option value="C.Artistique">Culture Artistique</option>
                            <option value="D.back">Développement Back</option>
                    </select>
                    <br>
                    <label for="login">Nom de l'élève :</label>
                    <br><input type="text" name="login" required> <!-- Ajout de name="login" -->
                    <br>
                    <label for="note">Note :</label>
                    <br><input type="number" name="note" required><br>
                    <label for="detail">Détails :</label>
                    <br><input type="text" name="detail" required><br>
                    <!-- Ajout de name="note" et type="number" -->
                    <input type="submit">
                </form>
            <?php endif; ?>
    </section>
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

</html>