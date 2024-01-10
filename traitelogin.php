<?php
session_start();
include "connexion.php";
$pdo->query('SET NAMES utf8');
$requete="SELECT * FROM utilisateur WHERE login=:login";
$stmt=$pdo->prepare($requete);
$stmt->bindParam(':login',$_GET["login"], PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowcount()==1){
	$result=$stmt->fetch(PDO::FETCH_ASSOC);

	// Vérification du mot de passe
	if (password_verify($_GET["mot_de_passe"],$result["mot_de_passe"])){
		$_SESSION["login"]=$_GET["login"];

		// Vérification si l'utilisateur est administrateur
        if ($result["isAdmin"]==1) {
            $_SESSION["admin"] = true;
        } else {
			$_SESSION["admin"] = false;
		}

        header('Location: accueil.php');

	} else {
		header ('Location:login.php?err=mot_de_passe');
	}

} else {
	header ('Location:login.php?err=login');
}


?>


