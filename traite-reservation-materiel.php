<?php
session_start();
include "connexion.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    // $utilisateur= $_POST["id_utilisateur"];
    $datedeb = $_POST["date_debut_m"];
    $horairedeb = $_POST["horaire_debut_m"];
    $datefin = $_POST["date_fin_m"];
    $horairefin = $_POST["horaire_fin_m"];
   
    $requete = "INSERT INTO reservation_materiel (date_debut_m, horaire_debut_m, date_fin_m, horaire_fin_m) VALUES (:date_debut_m, :horaire_debut_m, :date_fin_m, :horaire_fin_m)";
    $stmt = $db->prepare($requete);
    // $stmt->bindParam(':id_utilisateur', $utilisateur);
    $stmt->bindParam(':date_debut_m', $datedeb);
    $stmt->bindParam(':horaire_debut_m', $horairedeb);
    $stmt->bindParam(':date_fin_m', $datefin);
    $stmt->bindParam(':horaire_fin_m', $horairefin);
  

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
