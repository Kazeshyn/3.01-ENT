<?php
session_start();
include "connexion.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $datedeb = $_POST["date_debut_s"];
    $horairedeb = $_POST["horaire_debut_s"];
    $datefin = $_POST["date_fin_s"];
    $horairefin = $_POST["horaire_fin_s"];
   

    
    $requete = "INSERT INTO reservation_salle (date_debut_s, horaire_debut_s, date_fin_s, horaire_fin_s) VALUES (:date_debut_s, :horaire_debut_s, :date_fin_s, :horaire_fin_s)";

    $stmt = $db->prepare($requete);

    $stmt->bindParam(':date_debut_s', $datedeb);
    $stmt->bindParam(':horaire_debut_s', $horairedeb);
    $stmt->bindParam(':date_fin_s', $datefin);
    $stmt->bindParam(':horaire_fin_s', $horairefin);
   

    if ($stmt->execute()) {
        echo "La réservation a bien été effectuée.";
    
        // Redirection
        echo '<script>
                setTimeout(function() {
                    window.location.href = "reservation.php";
                }, 1000); // Retard de 3 secondes
              </script>';
    } else {
        echo "Une erreur s'est produite lors de la réservation.";
    }
}
?>



<?php
session_start();
include "connexion.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $utilisateur = $_POST["id_utilisateur"];
    $datedeb = $_POST["date_debut_m"];
    $horairedeb = $_POST["horaire_debut_m"];
    $datefin = $_POST["date_fin_m"];
    $horairefin = $_POST["horaire_fin_m"];
    $salle = $_POST["numero_salle"];

    $requete_salle = "SELECT id_salle FROM salle WHERE numero_salle = :numero_salle";
    $stmt_salle = $pdo->prepare($requete_salle);
    $stmt_salle->bindParam(':numero_salle', $salle);
    $stmt_salle->execute();
    $result_salle = $stmt_salle->fetch(PDO::FETCH_ASSOC);

    $id_salle = $result_salle['id_salle'];

    

   
    // Corriger la syntaxe de la requête SQL
    $requete = "INSERT INTO reservation_materiel (date_debut_m, horaire_debut_m, date_fin_m, horaire_fin_m, id_utilisateur, id_materiel, numero_salle) VALUES (:date_debut_m, :horaire_debut_m, :date_fin_m, :horaire_fin_m, :id_utilisateur, :id_materiel, :numero_salle)";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':id_utilisateur', $utilisateur);
    $stmt->bindParam(':date_debut_m', $datedeb);
    $stmt->bindParam(':horaire_debut_m', $horairedeb);
    $stmt->bindParam(':date_fin_m', $datefin);
    $stmt->bindParam(':horaire_fin_m', $horairefin);
    $stmt->bindParam(':id_materiel', $id_materiel);
    $stmt->bindParam(':id_salle', $id_salle);
    


    if ($stmt->execute()) {
        echo "La réservation a bien été effectuée.";
    
        // Redirection
        echo '<script>
                setTimeout(function() {
                    window.location.href = "reservation.php";
                }, 1000); // Retard de 3 secondes
              </script>';


        echo '<noscript>
              <meta http-equiv="refresh" content="1;url=reservation.php">
            </noscript>';

    } else {
        echo "Une erreur s'est produite lors de la réservation.";
    }
}
?>
