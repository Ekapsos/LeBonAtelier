<?php
include("header.php");
$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$titre_actuel = $_POST['titre_actuel'];             //Variable POST
$nouveau_titre = $_POST['new_titre'];
$nouvelle_desc = $_POST['new_desc'];
$nouvelle_date_d = $_POST['new_date_d'];
$nouvelle_date_f = $_POST['new_date_f'];


                                                    //Modifier l'evenement choisi précédemment
$req = $bdd->prepare("UPDATE `evenement` 
		  SET `titre`= ?,`date_debut`= ?,`date_fin`= ?,`descriptif`= ? 
		  WHERE titre = ? ");
$req->execute(array($nouveau_titre,$nouvelle_date_d,$nouvelle_date_f,$nouvelle_desc,$titre_actuel));
	
                                                    //Redirection 
?>
<script type="text/javascript">                     
	if ( confirm( "L'événement à bien été modifier" ) ) {
		document.location.href="admin.php"; 
	} 
	else {
		document.location.href="admin.php";
	}
</script>
<?php

include("footer.php");
?>