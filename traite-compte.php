<?php
session_start();
include "connexion.php";

if (isset($_SESSION["login"]) && isset($_POST['infos'])) {
    $login = $_SESSION["login"];
    $nouvellesInfos = $_POST['infos'];

    // Mettez à jour la base de données avec les nouvelles informations
    $requeteUpdate = "UPDATE utilisateur SET info_generales=:infos WHERE login=:login";
    $stmtUpdate = $db->prepare($requeteUpdate);
    $stmtUpdate->bindParam(':infos', $nouvellesInfos, PDO::PARAM_STR);
    $stmtUpdate->bindParam(':login', $login, PDO::PARAM_STR);
    $stmtUpdate->execute();

    // Redirigez vers la page actuelle pour afficher les nouvelles informations
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
