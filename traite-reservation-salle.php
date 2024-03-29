<?php
session_start();
include "connexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $utilisateur = $_POST["id_utilisateur"];
    $datedeb = $_POST["date_debut_s"];
    $horairedeb = $_POST["horaire_debut_s"];
    $datefin = $_POST["date_fin_s"];
    $horairefin = $_POST["horaire_fin_s"];
    $salle = $_POST["numero_salle"];

    // Requête pour obtenir l'id de la salle en fonction du numéro
    $requete_salle = "SELECT id_salle FROM salle WHERE numero_salle = :numero_salle";
    $stmt_salle = $pdo->prepare($requete_salle);
    $stmt_salle->bindParam(':numero_salle', $salle);
    $stmt_salle->execute();
    $result_salle = $stmt_salle->fetch(PDO::FETCH_ASSOC);

    // Assurez-vous que l'id de la salle est récupéré avec succès
    if ($stmt_salle->rowCount() > 0) {
        $id_salle = $result_salle['id_salle'];

        // Requête SQL pour insérer la réservation dans la table reservation_salle
        $requete = "INSERT INTO reservation_salle (date_debut_s, horaire_debut_s, date_fin_s, horaire_fin_s, id_utilisateur, id_salle) VALUES (:date_debut_s, :horaire_debut_s, :date_fin_s, :horaire_fin_s, :id_utilisateur, :id_salle)";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':id_utilisateur', $utilisateur);
        $stmt->bindParam(':date_debut_s', $datedeb);
        $stmt->bindParam(':horaire_debut_s', $horairedeb);
        $stmt->bindParam(':date_fin_s', $datefin);
        $stmt->bindParam(':horaire_fin_s', $horairefin);
        $stmt->bindParam(':id_salle', $id_salle);

        // Exécutez la requête et vérifiez le résultat
        if ($stmt->execute()) {
            echo "La réservation a bien été effectuée.";
            // Redirection après 1 seconde
            echo '<script>
                setTimeout(function() {
                    window.location.href = "reservation.php";
                }, 1000);
              </script>';
        } else {
            echo "Une erreur s'est produite lors de la réservation.";
        }
    } else {
        echo "La salle avec le numéro spécifié n'a pas été trouvée.";
    }
} else {
    echo "Erreur : la requête n'est pas de type POST.";
}
?>
