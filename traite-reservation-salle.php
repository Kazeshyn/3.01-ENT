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
