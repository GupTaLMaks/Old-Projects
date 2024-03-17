<?php session_start();?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/panier.css"/>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<link rel="stylesheet" type="text/css" href="css/recherche.css"/>
<script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="//cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

<title>Tote World</title>
</head>
<body>

  <?php include_once('header.inc');
  if (!isset($_SESSION['numclient']) || $_SESSION['numclient']=="") {echo "<script type='text/javascript'>document.location.replace('connexion.php');</script>";}
  ?>

  <section class="panier">
    <h3>MES COMMANDES</h3>
  </section>
  <section class="tableau">
      <table>
            <tr>
                <th>Numéro de commande</th>
                <th>Date d'achat</th>
                <th>Prix total</th>
            </tr>
            <?php
                require_once("model/Commande.class.php");
                $tab=Commande::getCommandes($_SESSION['numclient']);
                foreach($tab as $v){
                    echo $v;
                }
            ?>
        </table>
    </section>

    <?php include_once('footer.inc') ?>

</body>
</html>