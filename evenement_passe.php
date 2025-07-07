<!DOCTYPE html>
<html>
<head>
  <title>Evenement</title>
</head>
<body style= "background: url(img/bg.jpg) no-repeat center fixed;background-size: cover;">
  
  <?php include("header.php");
  $bdd = new PDO ('mysql:host=localhost;dbname=lba;charset=utf8', 'root', 'root' , array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $req = $bdd->prepare("SELECT `titre`, `date_debut`, `date_fin`, `descriptif`, `lien_image` FROM `evenement`");
    $req->execute(array());

    $i=1;

    ?> <div class="contener">
        <div class="row"> <?php

    foreach ($req as $donnee) { 
      $date1 = new DateTime(date("Y-m-d"));
      $date2 = new DateTime($donnee["date_fin"]);


      if ($date1>$date2) { 
        ?>
        
      <div class="pl-5 pt-5 col-md-4 col-md-offset-1">
        <div class="card" style="width: 18rem;">
          <img src="img/<?= $donnee["lien_image"] ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?= $donnee["titre"]; ?></h5>
            <p class="card-text">Du <?= $donnee["date_debut"]; ?> Au <?= $donnee["date_fin"]; ?> </br><?= $donnee["descriptif"]; ?></p>
          </div>
      </div>
    </div>


      <?php 
      } 
     } ?>

      </div>
</div>



</body>
<?php include("footer.php");?>
</html>