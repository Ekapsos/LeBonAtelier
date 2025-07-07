<?php
session_start();
$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); //Connexion BDD


$old_identifiant = htmlspecialchars($_SESSION['identifiant']); //identifiant actuel

//Partie pour accédé au info rentrer dans les formulaire
$nouveau_identifiant = htmlspecialchars($_POST['new_identifiant']);
$nouveau_mail = htmlspecialchars($_POST['new_mail']);
$nouveau_tel =htmlspecialchars($_POST['new_tel']);



//Requêtes de changement 
$req = $bdd->prepare("UPDATE utilisateur SET mail_contact = ? WHERE identifiant = ?" );
$req->execute(array($nouveau_mail,$old_identifiant));

$req = $bdd->prepare("UPDATE utilisateur SET identifiant = ? WHERE identifiant = ?" );
$req->execute(array($nouveau_identifiant,$old_identifiant));

$req = $bdd->prepare("UPDATE utilisateur SET tel_contact = ? WHERE identifiant = ?" );
$req->execute(array($nouveau_tel,$old_identifiant));
header('Location: connexion.php');

?>