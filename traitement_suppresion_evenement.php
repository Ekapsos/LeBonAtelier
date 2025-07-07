<?php
$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$nom_event = $_POST['titre_evenement'];

if ($_POST['supprimer'] == 'value1') {
	$req = $bdd->prepare("DELETE FROM `evenement` WHERE `titre` = ? ");
	$req->execute(array($nom_event));
}/*else {
}*/
?> 
<script type="text/javascript">
    if ( confirm( "L'évenement à bien été supprimer" ) ) {
        document.location.href="admin.php"; 
    } 
    else {
        document.location.href="admin.php";
        }
</script>
<?php
?>