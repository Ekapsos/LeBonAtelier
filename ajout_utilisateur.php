<?php
$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$prenom_utilisateur = htmlspecialchars($_POST['new_prenom']);
$nom_utilisateur = htmlspecialchars($_POST['new_nom']);
$identifiant_utilisateur = htmlspecialchars($_POST['new_id']);
$mail_utilisateur = htmlspecialchars($_POST['email']);
$mdp_utilisateur = $_POST['mdp'];
$telephone_utilisateur = htmlspecialchars($_POST['telephone']);
$hash = password_hash($mdp_utilisateur, PASSWORD_DEFAULT);


$req = $bdd->prepare("INSERT INTO `utilisateur`( `identifiant`, `mdp`, `mail_contact`, `tel_contact`, `nom`, `prenom`) 
					  VALUES (?,?,?,?,?,?)");
$req->execute(array($identifiant_utilisateur,$hash,$mail_utilisateur,$telephone_utilisateur,$nom_utilisateur,$prenom_utilisateur));
header('Location: admin.php');

?>