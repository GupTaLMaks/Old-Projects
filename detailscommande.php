<?php session_start();?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/panier.css"/>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<link rel="stylesheet" type="text/css" href="css/recherche.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>

<script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="//cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

<title>Tote World</title>
<script type="text/javascript">
  function commander() {
    $.get("https://dev-22002914.users.info.unicaen.fr/Toteworld/model/entercommande.php",
      function(data){
                let d=document.write(data);
                if(!d){window.location.reload();}
      }
    );
  }
</script>
</head>
<body>

  <?php include_once('header.inc');
  if (!isset($_SESSION['numclient']) || $_SESSION['numclient']=="") {echo "<script type='text/javascript'>document.location.replace('connexion.php');</script>";}
  ?>

  <section class="panier">
    <h3>Commande n°<?php echo $_GET['numcom']?></h3>
  </section>

  <section class="bouton"><a href="nostotes.php"><input type="button" value="Continuer mes achats"></a></section>

  <section class="tableau">
      <table>
            <tr>
                <th colspan="2">Produits</th>
                <th>Prix</th>
            </tr>
            <?php
                require_once("model/Quantite.class.php");
                $prixtotal=Quantite::produitCom($_GET['numcom']);
            ?>
            <tr>
                <td id="vide"></td>
                <th id="t1">Total TTC</th>
                <td class="prix"><?php echo $prixtotal; ?> €</td>
            </tr>
        </table>
    </section>
    <?php include_once('footer.inc') ?>

</body>
</html>