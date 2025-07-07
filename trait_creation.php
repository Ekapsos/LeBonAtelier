<?php
include("header.php");

 if (isset($_POST["bt1"])) {
 	var_dump($_POST);
 	var_dump($_FILES["input"]["name"]);
 	$input;
 	$category;
 	$desc1;
 	$check1 = 0;

 	$ok = false;
 	$upload = false;

 	if ($_POST["category"] == 'Choisir une catégorie') {
 		?> <script type="text/javascript">
 				if ( confirm( "veuillez choisir une catégorie !" ) ) {
        			document.location.href="admin.php"; 
    			} else {
        			document.location.href="admin.php";
    			}</script>
    	<?php
 	}
 	else{
 		$category = $_POST["category"];

 		if (isset($_POST["desc1"])) {
 			$desc1 = htmlspecialchars($_POST["desc1"]);

 			if ($_FILES["input"]["name"] != '') {
 				$input = $_FILES["input"]["name"];
 				$ok = true;

 				if (isset($_POST["check1"])) {
 					$check1 = 1;
 				}
 			}
 			else{
 				?> <script type="text/javascript">
 					if ( confirm( "veuillez ajouter un fichier !" ) ) {
        				document.location.href="admin.php"; 
    				} else {
        				document.location.href="admin.php";
    				}</script>
    			<?php 
 			}
 		}
 		else
 		{
 			?> <script type="text/javascript">
 					if ( confirm( "veuillez entrer une description !" ) ) {
        				document.location.href="admin.php"; 
    				} else {
        				document.location.href="admin.php";
    				}</script>
    		<?php 
 		}
 	}

 
 	if ($ok) {
 		$target_dir = "img/";
		$target_file = $target_dir . basename($_FILES["input"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
    	$check = getimagesize($_FILES["input"]["tmp_name"]);
    	if($check !== false) {
        	$uploadOk = 1;
    	} else {
        	?> <script type="text/javascript">
 				if ( confirm( "Le fichier n'est pas une image." ) ) {
        			document.location.href="admin.php"; 
    			} else {
        			document.location.href="admin.php";
    			}</script>
    	<?php
        	$uploadOk = 0;
    	}
		// Check if file already exists
		if (file_exists($target_file)) {
    		?> <script type="text/javascript">
 				if ( confirm( "Désoler le fichier ou un homonyme existe déjà sur ce serveur" ) ) {
        			document.location.href="admin.php"; 
    			} else {
        			document.location.href="admin.php";
    			}</script>
    	<?php
    		$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["input"]["size"] > 500000) {
    		?> <script type="text/javascript">
 				if ( confirm( "Désolé, votre fichier est trop volumineux." ) ) {
        			document.location.href="admin.php"; 
    			} else {
        			document.location.href="admin.php";
    			}</script>
    	<?php
    		$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    		?> <script type="text/javascript">
 				if ( confirm( "Désolé, seul les extensions JPG, PNG, JPEG et GIF sont autorisé." ) ) {
        			document.location.href="admin.php"; 
    			} else {
        			document.location.href="admin.php";
    			}</script>
    	<?php
    		$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
    		?> <script type="text/javascript">
 				if ( confirm( "Votre fichier n'a pas été uploadé" ) ) {
        			document.location.href="admin.php"; 
    			} else {
        			document.location.href="admin.php";
    			}</script>
    	<?php
		// if everything is ok, try to upload file
		} else {
    		if (move_uploaded_file($_FILES["input"]["tmp_name"], $target_file)) {
        		?> <script type="text/javascript">
 				if ( confirm( "le fichier à bien été uploadé." ) ) {
        			document.location.href="admin.php"; 
    			} else {
        			document.location.href="admin.php";
    			}</script>
    	<?php
        		$upload = true;
    		} else {
        		?> <script type="text/javascript">
 				if ( confirm( "Désolé, une erreur est survenu lors de l'upload." ) ) {
        			document.location.href="admin.php"; 
    			} else {
        			document.location.href="admin.php";
    			}</script>
    	<?php
    		}
		}		
	}

	if ($upload) {

		switch ($category) {
			case 'Meuble':
				$category = 'M';
				break;

			case 'Objet':
				$category = 'O';
				break;

			case 'Chantier':
				$category = 'C';
				break;

			case 'Enseigne':
				$category = 'E';
				break;

			case 'Evenement de vie':
				$category = 'EV';
				break;

			case 'Autre':
				$category = 'A';
				break;
			
			default:
				break;
		}


		$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
        $req = $bdd->prepare("INSERT INTO `creation`(`description`, `lien_image`, `MC`, `type_creation`) VALUES (?,?,?,?)");
        $req->execute(array($desc1, $input, $check1, $category));
	}






 }

 if (isset($_POST["bt2"])) {
 	$check = 0;
 	if (isset($_POST["bloublou"])) {
 		$check = 1;
 	}
 	if ($_POST["creation"] != "Choisir une création") {
 		$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    	$req = $bdd->prepare("UPDATE `creation` SET `description`=?, `MC`=? WHERE lien_image LIKE ?");
    	$req->execute(array(htmlspecialchars($_POST["description"]), $check, $_POST["creation"]));
    	header("Location: admin.php");
 	}
 	else{
 		?> <script type="text/javascript">
 				if ( confirm( "Il faut selectionner une création" ) ) {
        			document.location.href="admin.php"; 
    			} else {
        			document.location.href="admin.php";
    			}</script>
    	<?php
 	}
 } 

 if (isset($_POST["bt3"])) {
 	if (isset($_POST["accepte"])) {
 		if ($_POST["lien"] != "Choisir une création") {
 			$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    		$req = $bdd->prepare("DELETE FROM `creation` WHERE lien_image LIKE ?");
    		$req->execute(array($_POST["lien"]));
    		header("Location: admin.php");
 		}
 		else{
 			?> <script type="text/javascript">
 				if ( confirm( "Il faut choisir une création" ) ) {
        			document.location.href="admin.php"; 
    			} else {
        			document.location.href="admin.php";
    			}</script>
    	<?php
 		}
 	}
 	else{
 		?> <script type="text/javascript">
 				if ( confirm( "Il faut cocher la case : J'accepte de supprimer" ) ) {
        			document.location.href="admin.php"; 
    			} else {
        			document.location.href="admin.php";
    			}</script>
    	<?php
 	}
 } 

?>