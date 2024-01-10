<?php
session_start();

$host = 'localhost';
$dbname = 'ent';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

// Vérifier si l'utilisateur est connecté et est un administrateur
if (isset($_SESSION['login']) && isset($_SESSION['admin']) && $_SESSION['admin']) {
    // Récupérer les données du formulaire
    $matiere = isset($_POST['matiere']) ? $_POST['matiere'] : '';
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $note = isset($_POST['note']) ? $_POST['note'] : '';
    $detail = isset($_POST['detail']) ? $_POST['detail'] : '';

    // Validation des données (vous pouvez ajouter plus de validation selon vos besoins)
    if (empty($matiere) || empty($login) || empty($note)) {
        echo "Tous les champs doivent être remplis.";
        exit();
    }

    // Insérer les données dans la table note
    $sql = "INSERT INTO note (nom_cours, login, note, detail_note) VALUES (:nom_cours, :login, :note, :detail)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom_cours', $matiere, PDO::PARAM_STR);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->bindParam(':note', $note, PDO::PARAM_STR);
    $stmt->bindParam(':detail', $detail, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "La note a été ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la note.";
    }
} else {
    echo "Accès non autorisé.";
}
?>
