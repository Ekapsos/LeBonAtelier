<?php
include("header.php");
$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$nom_event = $_POST['titre_evenement'];		//Varialble POST
$desc_event = $_POST['descriptif'];
$date_d_event = $_POST['date_d'];
$date_f_event = $_POST['date_f'];



if (isset($_POST["bt1"])) {		//Si POST existe, on créer des variable on l'on met le nom du ficher
 	$input;
 	$category;
 	$desc1;
 	$check1 = 0;

 	$ok = false;
 	$upload = false;
 		

 	if ($_FILES["input"]["name"] != '') {
 		$input = $_FILES["input"]["name"];
 		$ok = true; 		
 	}
 	else{						//Sinon, on demande d'ajouter un fichier + redirerction a la page précedente
 		?>
		<script type="text/javascript">
			if ( confirm( "Veuillez ajouter un fichier !" ) ) {
				document.location.href="admin.php"; 
			} 
			else {
				document.location.href="admin.php";
			}
		</script>
		<?php
 	}
 
 	if ($ok) {					//Si $ok on créer des variable pour simplifier l'ajout dans la BDD du fichier
 		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["input"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Regarde si le fichier est une image ou une fausse image
    	$check = getimagesize($_FILES["input"]["tmp_name"]);
    	if($check !== false) {		//Si $uploadOk = 1, cela veut dire que le fichier est une image
        	$uploadOk = 1;
    	} 
		else {						//Sinon le fichier n'est pas un image donc redirerction
    		?>
			<script type="text/javascript">
				if ( confirm( "Le fichier n'est pas une image." ) ) {
					document.location.href="admin.php"; 
				} 
				else {
					document.location.href="admin.php";
				}
			</script>
			<?php
    	}
		// Regarde si le fichier existe deja
		if (file_exists($target_file)) {		//Regarde si le fichier existe deja, ou un homonyme
			?>
			<script type="text/javascript">
				if ( confirm( "Désoler le fichier ou un homonyme existe déjà sur ce serveur" ) ) {
					document.location.href="admin.php"; 
				} 
				else {
					document.location.href="admin.php";
				}
			</script>
			<?php
    		$uploadOk = 0;
		}
		// Regarde le taille du fichier
		if ($_FILES["input"]["size"] > 500000) {	//Regarde la taille du fichier pour qu'il ne soit pas trop volumineux
			?>
			<script type="text/javascript">
				if ( confirm( "Désolé, votre fichier est trop volumineux." ) ) {
					document.location.href="admin.php"; 
				} 
				else {
					document.location.href="admin.php";
				}
			</script>
			<?php
    		$uploadOk = 0;
		}
		// Autorise seulement certains types de fichier
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {	//Regarde l'extention du fichier
			?>
			<script type="text/javascript">
				if ( confirm( "Désolé, seul les extention JPG, PNG, JPEG et GIF sont autorisé." ) ) {
					document.location.href="admin.php"; 
				} 
				else {
					document.location.href="admin.php";
				}
			</script>
			<?php
    		$uploadOk = 0;
		}
		// Regarde si $uploadOk est a 0 du a une erreur
		if ($uploadOk == 0) {					//$uploadOk = 0 veut dire que le fichern'a pas été sauvegarder
			?>
			<script type="text/javascript">
				if ( confirm( "Désolé votre fichier n'a pas été uploadé." ) ) {
					document.location.href="admin.php"; 
				} 
				else {
					document.location.href="admin.php";
				}
			</script>
			<?php
		// Si tout est ok, upload le ficher
		} else {								//Sinon le fichier est sauvegarder a l'endroi prevu par $target_file
    		if (move_uploaded_file($_FILES["input"]["tmp_name"], $target_file)) {
        		echo "Le fichier : ". basename( $_FILES["input"]["name"]). " a bien été uploadé.";
        		$upload = true;
    		} else {							//Si il y a eu une erreur lors de l'upload
    			?>
				<script type="text/javascript">
					if ( confirm( "Dédolé, une erreur est survenu lors de l'upload." ) ) {
						document.location.href="admin.php"; 
					} 
					else {
						document.location.href="admin.php";
					}
				</script>
				<?php
    		}
		}
		if ($upload) {							//Insertion dans la BDD des variables POST recuperer précédemment 
			$req = $bdd->prepare("INSERT INTO `evenement`(`titre`, `date_debut`, `date_fin`, `descriptif`, `lien_image`) 
					  VALUES (?,?,?,?,?)");
			$req->execute(array($nom_event,$date_d_event,$date_f_event,$desc_event,$input));
			?>
			<script type="text/javascript">
				if ( confirm( "Bien uploadé" ) ) {
					document.location.href="admin.php"; 
				} 
				else {
					document.location.href="admin.php";
				}
			</script>
			<?php
		}		
	}
}


include("footer.php");
?>
