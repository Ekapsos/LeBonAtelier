<!DOCTYPE html>
<html>
<head>
   <title>Les meubles</title>
</head>
<body style= "background: url(img/bg.jpg) no-repeat center fixed;background-size: cover;">
    <?php include("header.php"); ?>

    <br>

    <div class="container-fluid" >
        <div class="card-columns">
        <?php
            $bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                //Séléctionne les creations "meubles"
            $req = $bdd->prepare("SELECT `description`, `lien_image` FROM `creation` WHERE type_creation ='M'");
            $req->execute(array());
            
                //Affiche les creations récuperer depuis la BDD grace a un foreach 
            foreach ($req as $donnee) { ?>
                <div class="card" style="width: 100%;">
                    <img src="img/<?= $donnee['lien_image']?>" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text"> <?= $donnee['description'] ?> </p>
                    </div>
                </div>
                <br>
            <?php } ?>
        </div>
    </div>
	 

</body>
<?php include("footer.php");?>
</html>