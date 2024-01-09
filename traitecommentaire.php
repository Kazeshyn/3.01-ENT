<?php
session_start();
include "connexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $id_post = $_POST['id_post'];
    $id_utilisateur = $_POST['id_utilisateur'];
    $contenu = $_POST['contenu'];

    // Ajouter le commentaire à la base de données
    $requete_comment = "INSERT INTO commentaire (id_post, id_utilisateur, contenu_commentaire, date_commentaire) VALUES (:id_post, :id_utilisateur, :contenu_commentaire, CURRENT_DATE)";
    $stmt_comment = $db->prepare($requete_comment);

    // Lier les paramètres
    $stmt_comment->bindParam(':id_post', $id_post, PDO::PARAM_INT);
    $stmt_comment->bindParam(':id_utilisateur', utf8_encode($id_utilisateur), PDO::PARAM_STR);

    $stmt_comment->bindParam(':contenu_commentaire', $contenu, PDO::PARAM_STR);

    if ($stmt_comment->execute()) {
        // Le commentaire a été ajouté avec succès
        header("Location: post.php?id=$id_post");
        exit();

    } else {
        // Une erreur s'est produite lors de l'ajout du commentaire
        echo "Erreur lors de l'ajout du commentaire.";
    }

    $stmt_comment->close();
} else {
    header("Location: index.php");
    exit();
}
?>
