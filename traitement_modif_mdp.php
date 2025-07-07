<?php
session_start();
$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); //Connexion à la BDD ( à changer quand elle sera en ligne)

$old_identifiant = htmlspecialchars($_SESSION['identifiant']); // Permet d'avoir le nom de la personne connecté actuellement
$nouveau_mdp = htmlspecialchars($_POST['new_mdp']); //Nouveau mdp

$hash = password_hash($nouveau_mdp, PASSWORD_DEFAULT);//Hesh le nouveau de mdp

$req = $bdd->prepare("UPDATE utilisateur SET mdp = ? WHERE identifiant = ?" );//requête
$req->execute(array($hash,$old_identifiant));//tableau qui complète la requête
header('Location: connexion.php');// ramène à la page de connexion

?>