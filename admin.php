<?php session_start();
if (isset($_SESSION["identifiant"])) {
  ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <?php include("header.php"); ?>

    <nav class="nav nav-tabs px-5">
      <a class="nav-item nav-link active" href="#p1" data-toggle="tab">Mon Compte</a>
      <a class="nav-item nav-link" href="#p2" data-toggle="tab">Création</a>
      <a class="nav-item nav-link" href="#p3" data-toggle="tab">Evénement</a>
      <a class="nav-item nav-link" href="#p4" data-toggle="tab">Gestion Utilisateurs</a>
    </nav>
    <div class="tab-content px-3">

  <div class="tab-pane fade show active" id="p1">
        <div class="border border-info mt-3 mb-3">
           <div class="alert alert-info" role="alert">Modifier information</div>
           <div class="pl-3 pb-3">
<?php
$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); //Connexion BDD
//Permet d'avoir les informations actuel de l'utilisateur pour préremplir les formulaires
$identifiant=$_SESSION["identifiant"];

$req = $bdd->prepare("SELECT mail_contact FROM utilisateur WHERE identifiant= ? " );
$req->execute(array($identifiant));
$mail = $req->fetch();

$req2 = $bdd->prepare("SELECT tel_contact FROM utilisateur WHERE identifiant= ? " );
$req2->execute(array($identifiant));
$tel = $req2->fetch();





?>
<!-- ---------Formulaire modif Identifiant/adresse/telephone préremplis avec les informations prise plus haut -------- -->
       <form action="traitement_modif_information.php" method="post">

           </div>

           <div class="form-group pt-2">
             <label>Identifiant</label>
             <input class="form-control" name="new_identifiant"   id="validationTextarea2" value=<?php echo $identifiant; ?>  >
           </div>
            <div class="form-group pt-2">
             <label for="exampleInputEmail1">Adresse mail</label>
             <input type="email" class="form-control" name="new_mail"  id="exampleInputEmail2"  value=<?php echo $mail[0]; ?>>
          </div>
           <div class="form-group pt-2">
             <label for="example-tel-input">Telephone</label>
             <input type="tel" class="form-control"  name="new_tel" value=<?php echo $tel[0]; ?> id="example-tel-input2">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" name="modif" required="required" value="value1" class="form-check-input" id="exampleCheck4">
            <label class="form-check-label" for="Check3">J'accepte de Modifier</label>
          </div>
         <button type="submit" class="btn btn-primary" >Modifier</button>
       </form>
     </div>
     
     <!-- ------------------------------------------------------------------- -->
     <!-- Traitement a part pour modifier le mot de passe -->
          <form action="traitement_modif_mdp.php" method="post">

     <div class="tab-pane fade show active" id="p1">
           <div class="border border-info mt-3 mb-3">
              <div class="alert alert-info" role="alert">Modifier Mot de passe</div>
              <div class="pl-3 pb-3">

                <div class="form-group pt-2">
                    <label for="exampleInputPassword1">Nouveau Mot de Passe</label>
                    <input type="password" class="form-control" name="new_mdp"  id="exampleInputPassword2" >
              </div>
              <div class="form-group form-check">
                <input type="checkbox" name="modif" required="required" value="value1" class="form-check-input" id="exampleCheck4">
                <label class="form-check-label" for="Check3">J'accepte de Modifier</label>
              </div>
             <button type="submit" class="btn btn-primary" >Modifier</button>
           </form>
        <!-- -------------------------------------------------------------------- -->

              </div>
            </div>
          </div>
     
      </div>

      <div class="tab-pane fade" id="p2">
      	<div class="border border-success mt-3">
      		<div class="alert alert-success" role="alert">
 				Ajouter une création
			</div>
			<div class="pl-3 pb-3">
				<form method="post" action="trait_creation.php" enctype="multipart/form-data">
					<div class="form-group">
    					<label for="exampleFormControlFile1">Example file input</label>
    					<input type="file" name="input" class="form-control-file" id="exampleFormControlFile1">
  					</div>
  					<div class="form-group pt-2">
  						<label>Catégorie</label>
    					<select name="category" class="form-control">
  							<option>Choisir une catégorie</option>
  							<option>Meuble</option>
  							<option>Objet</option>
  							<option>Chantier</option>
  							<option>Enseigne</option>
                <option>Evenement de vie</option>
  							<option>Autre</option>
						</select>
  					</div>
  					<div class="form-group pt-2">
  						<label>Description</label>
    					<textarea name="desc1" class="form-control" id="validationTextarea" placeholder="Entrez une description" required></textarea>
  					</div>
  					<div class="form-group form-check">
    					<input name="check1" type="checkbox" class="form-check-input" id="exampleCheck1">
    					<label class="form-check-label" for="exampleCheck1">Mettre sur la page d'accueil</label>
  					</div>
  					<button type="submit" name="bt1" class="btn btn-primary">Ajouter</button>
				</form>
			</div>
		</div>
		<div class="border border-warning mt-3">
	  	<div class="alert alert-warning" role="alert">
			Modifier une création
		</div>
			<div class="pl-3 pb-3">
				<form method="post" action="trait_creation.php">
					<div class="form-group pt-2">
  						<label>Création</label>
    					<select class="form-control" name="creation">
  							<option>Choisir une création</option>
  							<?php
            					$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            					$req = $bdd->prepare("SELECT `lien_image` FROM `creation`");
           					 	$req->execute(array());
           					 	while ($donnee = $req->fetch()) {
           					 		echo "<option>".$donnee["lien_image"]."</option>";
           					 	}
           					?>

						</select>
  					</div>

  					<div class="form-group pt-2">
  						<label>Description</label>
    					<textarea name="description" class="form-control" id="validationTextarea" placeholder="Entrez nouvelle description" required></textarea>
  					</div>
  					<div class="form-group form-check">
    					<input name="bloublou" type="checkbox" class="form-check-input" id="exampleCheck2">
    					<label class="form-check-label" for="exampleCheck2">Mettre sur la page d'accueil</label>
  					</div>
					<button type="submit" name="bt2" class="btn btn-primary">Modifier</button>
  				</form>
			</div>
	  	</div>


	  		<div class="border border-danger mt-3 mb-3">
	  	<div class="alert alert-danger" role="alert">
			supprimer une création
		</div>
			<div class="pl-3 pb-3">
				<form method="post" action="trait_creation.php">
					<div class="form-group pt-2">
  						<label>Création</label>
    					<select name="lien" class="form-control">
  							<option>Choisir une création</option>
  							<?php
            					$bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            					$req = $bdd->prepare("SELECT `lien_image` FROM `creation`");
           					 	$req->execute(array());
           					 	while ($donnee = $req->fetch()) {
           					 		echo "<option>".$donnee["lien_image"]."</option>";
           					 	}
           					?>

						</select>
  					</div>
  					<div class="form-group form-check">
    					<input name="accepte" type="checkbox" class="form-check-input" id="exampleCheck3">
    					<label class="form-check-label" for="exampleCheck3">J'accepte de supprimer</label>
  					</div>
					<button type="submit" name="bt3" class="btn btn-primary">Supprimer</button>
  				</form>
			</div>
	  	</div>
	  	</div>


    <div class="tab-pane fade" id="p3">


        <div class="border border-success mt-3">
          <div class="alert alert-success" role="alert">Ajouter un événement</div>
      <div class="pl-3 pb-3">

        <!--#######Ajout evenement#######-->
        <form action="traitement_ajout_evenement.php" method="post" enctype="multipart/form-data">
            <div class="form-group pt-2">
              <label>Titre</label>
              <input class="form-control" name="titre_evenement" id="validationTextarea" placeholder="Entrez un titre" required></input>
            </div>
            <div class="form-group pt-2">
              <label>Descriptif</label>
              <textarea class="form-control" name="descriptif" id="validationTextarea" placeholder="Entrez un descriptif" required></textarea>
            </div>
            <div class="form-group pt-2">
              <label>Date début</label>
              <input class="form-control" name="date_d" type="date" id="example-date-input">
            </div>
            <div class="form-group pt-2">
              <label>Date fin</label>
              <input class="form-control" name="date_f" type="date" id="example-date-input">
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Image événement</label>
              <input type="file" name="input" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button name="bt1" type="submit" class="btn btn-primary">Ajouter</button>
        </form>
      </div>
    </div>




    <div class="border border-warning mt-3">
      <div class="alert alert-warning" role="alert">Modifier un événement</div>
      <div class="pl-3 pb-3">

        <!--#######Modifier evenement#######-->
        <form action="traitement_modif_evenement.php" method="post">
          <div class="form-group pt-2">
              <label>Événement</label>
              <select name="titre_actuel" class="form-control">
                <option>Choisir un événement</option>
                <?php
                      $bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                      $req = $bdd->prepare("SELECT `titre` FROM `evenement`");
                      $req->execute(array());
                      while ($donnee = $req->fetch()) {
                        echo "<option>".$donnee["titre"]."</option>";
                      }
                    ?>

            </select>
            </div>
            <div class="form-group pt-2">
              <label>Titre</label>
              <input name="new_titre" class="form-control" id="validationTextarea" placeholder="Entrez nouveau un titre" required></input>
            </div>
            <div class="form-group pt-2">
              <label>Descriptif</label>
              <textarea name="new_desc" class="form-control" id="validationTextarea" placeholder="Entrez nouveau descriptif" required></textarea>
            </div>
            <div class="form-group pt-2">
              <label>Date début</label>
              <input class="form-control" name="new_date_d" type="date" id="example-date-input">
            </div>
            <div class="form-group pt-2">
              <label>Date fin</label>
              <input class="form-control" name="new_date_f" type="date" id="example-date-input">
            </div>

          <button name="bt1" type="submit" class="btn btn-primary">Modifier</button>
          </form>
      </div>
    </div>




      <div class="border border-danger mt-3 mb-3">
        <div class="alert alert-danger" role="alert">Supprimer un événement</div>
        <div class="pl-3 pb-3">

          <!--#######Suppresion evenement#######-->
        <form action="traitement_suppresion_evenement.php" method="post">
          <div class="form-group pt-2">
              <label>Événement</label>
              <select name="titre_evenement" class="form-control">
                <option>Choisir un événement</option>
                <?php
                      $bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                      $req = $bdd->prepare("SELECT `titre` FROM `evenement`");
                      $req->execute(array());
                      while ($donnee = $req->fetch()) {
                        echo "<option>".$donnee["titre"]."</option>";
                      }
                    ?>
            </select>
            </div>
            <div class="form-group form-check">
              <input type="checkbox" name="supprimer" required="required" value="value1" class="form-check-input" id="exampleCheck3">
              <label class="form-check-label" for="Check3">J'accepte de supprimer</label>
            </div>
          <button name="bt1" type="submit" class="btn btn-primary">Supprimer</button>
          </form>

      </div>
      </div>


      </div>

      <div class="tab-pane fade" id="p4">
          <div class="border border-info mt-3 mb-3">
            <div class="alert alert-info" role="alert">Ajouter un utilisateur</div>
            <div class="pl-3 pb-3">

        <!--#######Ajout Utilisateur#######-->
        <form action="ajout_utilisateur.php" method="post">

            </div>
            <div class="form-group pt-2">
              <label> Prénom</label>
              <input class="form-control" name="new_prenom"  id="validationTextarea" placeholder="Entrez votre prénom" required>
            </div>
            <div class="form-group pt-2">
              <label>Nom</label>
              <input class="form-control" name="new_nom"  id="validationTextarea" placeholder="Entrez votre nom " required>
            </div>
            <div class="form-group pt-2">
              <label>Identifiant</label>
              <input class="form-control" name="new_id"  id="validationTextarea" placeholder="Entrez votre identifiant " required>
            </div>
             <div class="form-group pt-2">
              <label for="exampleInputEmail1">Adresse mail</label>
              <input type="email" class="form-control" name="email"  id="exampleInputEmail1"  placeholder="Entrez un email">
           </div>
            <div class="form-group pt-2">
                <label for="exampleInputPassword1">Mot de Passe</label>
                <input type="password" class="form-control" name="mdp"  id="exampleInputPassword1" placeholder="Entre un mot de passe">
          </div>
            <div class="form-group pt-2">
              <label for="example-tel-input">Telephone</label>
              <input type="tel" class="form-control"  name="telephone" placeholder="06-06-06-06-06" id="example-tel-input">
           </div>

          <button type="submit" class="btn btn-primary">Envoyez</button>
        </form>
      </div>
      <div class="border border-danger mt-3 mb-3">
        <div class="alert alert-danger" role="alert">Supprimer un utilisateur</div>
        <div class="pl-3 pb-3">

          <!--#######Suppresion utilisateur#######-->
        <form action="traitement_suppresion_utiisateur.php" method="post">
          <div class="form-group pt-2">
              <label>Utilisateur</label>
              <select name="identifiant_supp" class="form-control">
                <option>Choisir un utilisateur</option>
                 <?php
                      $bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                      $req = $bdd->prepare("SELECT `identifiant` FROM `utilisateur`");
                      $req->execute(array());
                      while ($donnee = $req->fetch()) {
                        echo "<option>".$donnee["identifiant"]."</option>";
                      }
                    ?>
            </select>
            </div>
            <div class="form-group form-check">
              <input type="checkbox" name="supprimer" required="required" value="value1" class="form-check-input" id="exampleCheck3">
              <label class="form-check-label" for="Check3">J'accepte de supprimer</label>
            </div>
          <button type="submit" class="btn btn-primary">Supprimer</button>
          </form>

      </div>
    </div>



</body>

</html>

<?php } ?>
