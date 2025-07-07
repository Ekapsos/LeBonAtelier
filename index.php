<!DOCTYPE html>
<html>

	<head>
		<title>Accueil</title>
	</head>

	<body style= "background: url(img/bg.jpg) no-repeat center fixed;background-size: cover;"> <!-- paramètre du backgroud -->

		<?php include("header.php");	//inclusion du header ?>

		<!-- création d'un carousel en début de page -->
		<div id='carouselExampleControls' class='carousel slide h-25 w-50 mx-auto mt-5' data-ride='carousel'>
  			<div class='carousel-inner'>
  				<div class='carousel-item active'>
        			<img src='img/bienvenue.jpg' class='d-block w-100'>
      			</div>

      			<?php
      			//-- récupération des liens des photos et de leurs description pour remplir le carousel

      			$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				$req = $bdd->prepare("SELECT `description`, `lien_image` FROM `creation` WHERE MC = 1"); //seul les images MC=1 sont affiché
				$req->execute(array());

				//récupération des données et remplissage du carousel
				while ($donnee = $req->fetch()) {

					echo "<div class='carousel-item'>
        					<img src='img/".$donnee['lien_image']."' class='d-block w-100'>
        						<div class='carousel-caption d-none d-md-block'>
        			  				<p>".$donnee["description"]."</p>
        						</div>
      						</div>";
				}
				?>

			</div>

			<!-- Ajout des fleches de changement d'image -->
  			<a class='carousel-control-prev' href='#carouselExampleControls' role='button' data-slide='prev'>
    			<span class='carousel-control-prev-icon' aria-hidden='true'></span>
    			<span class='sr-only'>Previous</span>
  			</a>
  			<a class='carousel-control-next' href='#carouselExampleControls' role='button' data-slide='next'>
    			<span class='carousel-control-next-icon' aria-hidden='true'></span>
    			<span class='sr-only'>Next</span>
  			</a>

		</div>

	</body>

	<?php include("footer.php");	//inclusion du footer ?>

</html>

