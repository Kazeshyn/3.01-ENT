<?php
session_start();
include "connexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $id_utilisateur = $_POST['id_utilisateur'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $categorie = $_POST['categorie'];

    // Ajouter l'article à la base de données
    $requete_post = "INSERT INTO post (titre_post, contenu_post, categorie_post, id_utilisateur, date_post) VALUES (:titre_post, :contenu_post, :categorie_post, :id_utilisateur, CURRENT_DATE)";
    $stmt_post = $pdo->prepare($requete_post);

    // Lier les paramètres
    $stmt_post->bindParam(':titre_post', $titre, PDO::PARAM_STR);
    $stmt_post->bindParam(':contenu_post', $contenu, PDO::PARAM_STR);
    $stmt_post->bindParam(':categorie_post', $categorie, PDO::PARAM_STR);
    $stmt_post->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_STR);

    if ($stmt_post->execute()) {
        // L'article a été ajouté avec succès
        header("Location: forum.php");
        exit();
    } else {
        // Une erreur s'est produite lors de l'ajout de l'article
        echo "Erreur lors de l'ajout de l'article.";
    }
} else {
    header("Location: forum.php");
    exit();
}
?>
