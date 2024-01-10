<?php
session_start();
include "connexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'ID de le commentaire à supprimer
    $id_commentaire = $_POST['id_commentaire'];
    


        // Supprimer le commentaire de la base de données
        $requete_suppression_comment = "DELETE FROM commentaire WHERE id_commentaire = :id_commentaire";
        $stmt_suppression_comment = $db->prepare($requete_suppression_comment);
        $stmt_suppression_comment->bindParam(':id_commentaire', $id_commentaire, PDO::PARAM_INT);
    
        if ($stmt_suppression_comment->execute()) {
            // Le commentaire a été supprimé avec succès
            header("Location: forum.php");
            exit();
        } else {
            // Une erreur s'est produite lors de la suppression du commentaire
            echo "Erreur lors de la suppression du commentaire .";
        }
} else {
    
    exit();
}
?>
