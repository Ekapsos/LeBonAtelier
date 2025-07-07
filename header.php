<head>
	 <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
	
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>

<style type="text/css">
@font-face {
    font-family: ChopinScript;
    src: url("police/ChopinScript.otf") format("opentype");
}
</style>


<header>
  <nav id="header" class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark justify-content-center sb">
    <a class="navbar-brand mt-3" href="index.php"><text style="fill:#ffffff; font-family:ChopinScript; font-size:30%; font-size-adjust:1"><tspan x="0">Le BonAtelier</tspan></text></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <!-- Icone de menu (avec les 3 barres) lorsque l'écran est trop petit -->
      <span class="navbar-toggler-icon"></span>
    </button>
	 <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Les différents éléments de la navbar : -->
      <ul class="navbar-nav mr-auto">

      	<!-- Dropdown -->
    	<li class="nav-item dropdown">
      	<a class="nav-link text-info bold dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> Mes créations</a>
      	<div class="dropdown-menu bg-dark">
        	<a class="dropdown-item text-light bold" href="meuble.php">Les Meubles</a>
        	<a class="dropdown-item text-light bold" href="objet.php">Les Objets</a>
        	<a class="dropdown-item text-light bold" href="chantier.php">Les Chantiers</a>
        	<a class="dropdown-item text-light bold" href="enseigne.php">Les Enseignes</a>
          <a class="dropdown-item text-light bold" href="evenementvie.php">Evénements de Vie</a>
        	<a class="dropdown-item text-light bold" href="autre.php">Autres</a>
      	</div>
    	</li>

        <li class="nav-item dropdown">
        <a class="nav-link text-success bold dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> Evenements</a>
        <div class="dropdown-menu bg-dark">
          <a class="dropdown-item text-light bold" href="evenement.php">A venir</a>
          <a class="dropdown-item text-light bold" href="evenement_passe.php">Terminé</a>
        </div>
      </li>



      <li class="nav-item active mr-3">
            <!-- Bouton Duels -->
          <a class="nav-link text-warning bold" href="contact.php"><span class="oi oi-fire"></span> Contact</a>
      </li>

      <li class="nav-item active mr-3">
            <!-- Bouton Duels -->
          <a class="nav-link text-light bold" href="a_propos.php"><span class="oi oi-fire"></span> A propos</a>
      </li>
      

    </ul>
    

  </div>
</nav>
</header>