<?php
session_start();
include "connexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $image = $_POST['image'];
    $theme = $_POST['theme'];

    // Ajouter l'article à la base de données
    $requete_actu = "INSERT INTO actualite (titre_actu, contenu_actu, url_actu, theme_actu, date_actu) VALUES (:titre_actu, :contenu_actu, :url_actu, :theme_actu, CURRENT_DATE)";
    $stmt_actu = $db->prepare($requete_actu);

    // Lier les paramètres
    $stmt_actu->bindParam(':titre_actu', utf8_encode($titre), PDO::PARAM_STR);
    $stmt_actu->bindParam(':contenu_actu', $contenu, PDO::PARAM_STR);
    $stmt_actu->bindParam(':url_actu', $image, PDO::PARAM_STR);
    $stmt_actu->bindParam(':theme_actu', $theme, PDO::PARAM_STR);

    if ($stmt_actu->execute()) {
        // L'article a été ajouté avec succès
        header("Location: actu.php");
        exit();

    } else {
        // Une erreur s'est produite lors de l'ajout de l'article
        echo "Erreur lors de l'ajout de l'article.";
    }

    $stmt_actu->close();
} else {
    header("Location: actu.php");
    exit();
}
?>
