<?php
session_start();
include "connexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    var_dump($_POST);
    $nom = $_POST['nom'];
    $entree = $_POST['entree'];
    $plat1 = $_POST['plat1'];
    $plat2 = $_POST['plat2'];
    $dessert = $_POST['dessert'];
    $date = $_POST['date'];

    // Ajouter l'article à la base de données
    $requete_menu = "INSERT INTO menu (nom_menu, entree_menu, plat1_menu, plat2_menu, dessert_menu, date_menu) VALUES (:nom, :entree, :plat1, :plat2, :dessert, :date)";
    $stmt_menu = $pdo->prepare($requete_menu);

    // Lier les paramètres
    $stmt_menu->bindParam(':nom', utf8_encode($nom), PDO::PARAM_STR);
    $stmt_menu->bindParam(':entree', $entree, PDO::PARAM_STR);
    $stmt_menu->bindParam(':plat1', $plat1, PDO::PARAM_STR);
    $stmt_menu->bindParam(':plat2', $plat2, PDO::PARAM_STR);
    $stmt_menu->bindParam(':dessert', $dessert, PDO::PARAM_STR);
    $stmt_menu->bindParam(':date', $date, PDO::PARAM_STR);

    if ($stmt_menu->execute()) {
        // Le menu a été ajouté avec succès
        header("Location: restauration.php");
        exit();

    } else {
        echo "Erreur lors de l'ajout du menu.";
    }

    $stmt_menu->close();
} else {
    header("Location: restauration.php");
    exit();
}
?>
