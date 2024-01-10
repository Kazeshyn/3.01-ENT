<?php
session_start();
include "connexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_actu = $_POST['id_actu'];
    
        $requete_suppression = "DELETE FROM actualite WHERE id_actu = :id_actu";
        $stmt_suppression = $pdo->prepare($requete_suppression);
        $stmt_suppression->bindParam(':id_actu', $id_actu, PDO::PARAM_INT);
    
        if ($stmt_suppression->execute()) {
            header("Location: actu.php");
            exit();
        } else {
            echo "Erreur lors de la suppression de l'actualité.";
        }
} else {
    
    exit();
}
?>
