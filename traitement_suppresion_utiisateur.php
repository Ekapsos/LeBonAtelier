<?php

try{
   $bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}catch(PDOException $e){
   die('Erreur : '.$e->getMessage());
}

$identifiant_supp = $_POST['identifiant_supp'];

if ($_POST['supprimer'] == 'value1') {
	$req = $bdd->prepare("DELETE FROM `utilisateur` WHERE `identifiant` = '" .$identifiant_supp. "' ");
	$req->execute();
}/*else {
}*/
header('Location: admin.php');
?>