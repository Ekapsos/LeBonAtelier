<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<link rel="stylesheet" href="connexion.css" />
</head>
<body style= "background: url(img/bg.jpg) no-repeat center fixed;background-size: cover;">
<?php include("header.php"); ?>

<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Connexion</h2>

  <form class="login-container" method="post" action="trait_connexion.php">
    <p><input type="text" placeholder="Identifiant" name="id" required></p>
    <p><input type="password" placeholder="Mot de passe" name="mdp" required></p>
    <p><input type="submit" value="Connexion"></p>
  </form>
</div>
</body>
</html>