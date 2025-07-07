<?php
session_start();

if (isset($_POST["id"]) && isset($_POST["mdp"])) {
	$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$req = $bdd->prepare("SELECT `mdp` FROM `utilisateur` WHERE identifiant LIKE ?");
	$req->execute(array(htmlspecialchars($_POST["id"])));

	$pass = null;

	foreach ($req as $donnee) {
		$pass = $donnee["mdp"];
	}
	if ($pass != null) {
		if (password_verify ($_POST["mdp"] , $pass)) {
			$_SESSION['identifiant'] = htmlspecialchars($_POST["id"]);
			header("Location: admin.php");
		}
		else{
			echo "Mauvais identifiant ou mot de passe";
		}
	}
	else{
		echo "Mauvais identifiant ou mot de passe";
	}
	
}
else{
	echo "Veuillez entrer un identifiant et un mot de passe";
}

?>