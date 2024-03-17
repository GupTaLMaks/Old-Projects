<?php session_start();?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/compte.css"/>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="//cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

<title>Tote World</title>
</head>
<body>
  <section class="titre">
      <h1>MON COMPTE</h1>
  </section>
  
  <?php include_once('header.inc');
  if (isset($_SESSION['numclient']) && $_SESSION['numclient']!="") {
    echo "
    <a id=\"deco\" href=\"deconnexion.php\"><div>Déconnexion</div></a>
    
    <section class=\"contenu\">
          <a class=\"new\" href=\"commandes.php\"><div class=\"div\">
            <h2>Mes commandes</h2>
            <p>Suivre, retourner ou acheter à nouveau</p>
          </div></a>
      
          <a class=\"new\" href=\"compte.php\"><div class=\"div\">
              <h2>Connexion et sécurité</h2>
              <p>Modifier vos informations</p>
          </div></a>
      
          <a class=\"new\" href=\"compte.php\"><div class=\"div\">
              <h2>Mes avantages</h2>
              <p>Découvrir et profiter de mes avantages</p>
          </div></a>
      
          <a class=\"new\" href=\"compte.php\"><div class=\"div\">
              <h2>Mes paiements</h2>
              <p>Changer mes données bancaires</p>
          </div></a>
          
    </section>";
  }
  else echo "
    <section class=\"contenu\">
          <a class=\"new\" href=\"inscription.php\"><div class=\"div\">
            <h2>Inscription</h2>
            <p>Créez vous un compte</p>
          </div></a>
      
          <a class=\"new\" href=\"connexion.php\"><div class=\"div\">
              <h2>Connexion</h2>
              <p>Connectez-vous</p>
          </div></a>
          
    </section>
  ";


  ?>
  <?php include_once('footer.inc'); ?>
    
</body>
</html>