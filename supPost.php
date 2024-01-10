<?php
session_start();
include "connexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_post = $_POST['id_post'];
    
        $requete_suppression = "DELETE FROM post WHERE id_post = :id_post";
        $stmt_suppression = $db->prepare($requete_suppression);
        $stmt_suppression->bindParam(':id_post', $id_post, PDO::PARAM_INT);
    
        if ($stmt_suppression->execute()) {
            header("Location: forum.php");
            exit();
        } else {
            echo "Erreur lors de la suppression du post.";
        }
} else {
    
    exit();
}
?>
