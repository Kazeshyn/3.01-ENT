<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style_accueil.css">
    <link rel="stylesheet" href="./style_footerheader.css">
    <link rel="stylesheet" href="./style_edt_accueil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com%22%3E/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@400;800&display=swap" rel="stylesheet">
    <script src="script-burger.js" defer></script>
    <script src="script-sidenav.js" defer></script>
    <title>ENT - Accueil</title>
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
        <!-- Menu latéral -->
        <nav class="sidenav" id="menuside">
            <div class="opensidebutton" id="sidebar">
                ↔
            </div>
            <div class="infosideoff" id="infoside">
                <h2 class="titlelinkrecap">Récapitulatif</h2>
            </div>
            <div class="infosidehm" id="infosidehm">
                <h3 class="titlelinkrecap">Devoirs</h3>
                <div class="sideelementoff" id="generateElement">Exemple1 - 17 Décembre</div>
                <div class="sideelementoff" id="generateElement">Exemple1 - 17 Décembre</div>
            </div>
            <div class="infosidenote" id="infosidenote">
                <h3 class="titlelinkrecap">Notes</h3>
                <div class="sideelementoff" id="generateElement">Exemple1 - 17/20</div>
                <div class="sideelementoff" id="generateElement">Exemple1 - 2/10</div>
            </div>
        </nav>
        <!-- Boutons -->
        <div class="gridcontent">
        <div class="gridbuttons">
            <a href="" class="buttonlink">
                <img src="./img/Placeholder Circle.png" alt="" class="icons">
                <h2 class="titlelink">Mail</h2>
                <p></p>
            </a>
            <a href="" class="buttonlink">
                <img src="./img/Placeholder Circle.png" alt="" class="icons">
                <h2 class="titlelink">Cours</h2>
                <p></p>
            </a>
            <a href="" class="buttonlink">
                <img src="./img/Placeholder Circle.png" alt="" class="icons">
                <h2 class="titlelink">Réservations</h2>
                <p></p>
            </a>
            <a href="" class="buttonlink">
                <img src="./img/Placeholder Circle.png" alt="" class="icons">
                <h2 class="titlelink">Notes</h2>
                <p></p>
            </a>
        </div>
        <!-- EDT -->
        <div class="container">
            <h2 class="edttxt">Emploi du temps</h2>
            <div id="events-container"></div>
        </div>
        </div>
    </section>
    <!-- Footer -->
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
    var apiUrl = 'https://entmmi.fr/api/ade-ics';
    var jsonData;

    var requestData = {
        ical_url: 'https://edt.univ-eiffel.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=4905&projectId=25&calType=ical&nbWeeks=50',
        raw_data: false,
        parsed_data: true,
    };

    var xhr = new XMLHttpRequest();
    xhr.open('POST', apiUrl, true);
    xhr.setRequestHeader('Content-type', 'application/json');

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = JSON.parse(xhr.responseText);
            if (response.error) {
                console.error('API Error: ' + response.error.message);
            } else {
                jsonData = response; // Mise à jour ici
                afficherEmploiDuTemps();
            }
        } else {
            console.error(xhr.statusText);
        }
    };

    xhr.onerror = function() {
        console.error('Request failed');
    };

    xhr.send(JSON.stringify(requestData));

    function afficherEmploiDuTemps() {
        var today = new Date().setHours(0, 0, 0, 0) / 1000;

        var eventsContainer = document.getElementById('events-container');
        var todayEvents = jsonData.filter(function(event) {
            // Filtrer pour le groupe C uniquement
            return event.start >= today && event.end <= today + 24 * 60 * 60 && event.group.includes('D');
        });

        // Tri des événements par heure de début
        todayEvents.sort(function(a, b) {
            return a.start - b.start;
        });

        todayEvents.forEach(function(event) {
            var eventElement = document.createElement('div');
            eventElement.classList.add('event');

            var eventInfoElement = document.createElement('div');
            eventInfoElement.classList.add('event-info');

            eventInfoElement.innerHTML = `
                        <h2>${event.title ? event.title : 'Cours'}</h2>
                        <p>Formateur: ${event.trainer}</p>
                        <p>Début: ${formatTime(event.start)}</p>
                        <p>Fin: ${formatTime(event.end)}</p>
                        <p>Lieu: ${event.location.join(', ')}</p>
                    `;

            eventElement.appendChild(eventInfoElement);
            eventsContainer.appendChild(eventElement);
        });

        // Fonction pour formater le temps à partir du timestamp
        function formatTime(timestamp) {
            var date = new Date(timestamp * 1000);
            var hours = ('0' + date.getHours()).slice(-2);
            var minutes = ('0' + date.getMinutes()).slice(-2);
            return hours + ':' + minutes;
        }
    }
</script>

</html>