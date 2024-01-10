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

    $host = 'localhost';
    $dbname = 'ent';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }

    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['login'])) {
        $login = $_SESSION['login'];

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
            <a href="" class="logoheader"><img class="logoheader" src="./img/logoUniversite2.png" alt="Retourner à l'accueil (page actuelle)"></a>
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
    <section>
        <h1 class="titre-note">Notes</h1>
        <div class="chart-container"></div>
        <script>
            var data = <?php echo $json_data; ?>;
            RadarChart.draw(".chart-container", data);
        </script>
        <h2 class="titre-note-detail">Notes détaillées</h2>
        <div class="note-detail">
            <p>Eval du 17/11 - Note : 1.375986/20</p>
            <p>Eval du 17/11 - Note : 1.375986/20</p>
            <p>Eval du 17/11 - Note : 1.375986/20</p>
            <p>Eval du 17/11 - Note : 1.375986/20</p>
            <p>Eval du 17/11 - Note : 1.375986/20</p>
        </div>
    </section>
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
