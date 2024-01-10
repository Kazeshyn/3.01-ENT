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
    $materiel = $_POST["nom_materiel"];

    $requete_mat = "SELECT id_materiel FROM materiel WHERE nom_materiel = :nom_materiel";
$stmt_mat = $pdo->prepare($requete_mat);
$stmt_mat->bindParam(':nom_materiel', $materiel);
$stmt_mat->execute();
$result_mat = $stmt_mat->fetch(PDO::FETCH_ASSOC);

$id_materiel = $result_mat['id_materiel'];

    var_dump($id_materiel);
   
    // Corriger la syntaxe de la requête SQL
    $requete = "INSERT INTO reservation_materiel (date_debut_m, horaire_debut_m, date_fin_m, horaire_fin_m, id_utilisateur, id_materiel) VALUES (:date_debut_m, :horaire_debut_m, :date_fin_m, :horaire_fin_m, :id_utilisateur, :id_materiel)";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':id_utilisateur', $utilisateur);
    $stmt->bindParam(':date_debut_m', $datedeb);
    $stmt->bindParam(':horaire_debut_m', $horairedeb);
    $stmt->bindParam(':date_fin_m', $datefin);
    $stmt->bindParam(':horaire_fin_m', $horairefin);
    $stmt->bindParam(':id_materiel', $id_materiel);
  
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
