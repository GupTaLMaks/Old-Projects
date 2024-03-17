<?php session_start();
?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/article.css"/>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<link rel="stylesheet" type="text/css" href="css/recherche.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>

<script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="//cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

<title>Tote World</title>
<script type="text/javascript">
  function addPanier() {
    var q=$("#q").val();
    var id = <?php echo $_GET['idprod'] ?>;
    $.get("https://dev-22002914.users.info.unicaen.fr/Toteworld/model/addPanier.php",{"idprod":id,"quantite": q},
      function(data){
                let d=document.write(data);
                if(!d){window.location.reload();}
      }
    );
  }

  function addFavori() {
    var id = <?php echo $_GET['idprod'] ?>;
    $.get("https://dev-22002914.users.info.unicaen.fr/Toteworld/model/addFavori.php",{"idprod":id},
      function(data){
                window.location.reload();  
      }
    );
  }
</script>
</head>
<body>

  <?php include_once('header.inc') ?>

  <section class="article">
    <?php
      require_once("model/Produit.class.php");
      $id=$_GET['idprod'];
      Produit::pageProduit($id);

    ?>
  </section>


  <section class="proposition">
    <h2>Vous aimerez aussi</h2>
    <div class="props">
      <?php
        require_once("model/Produit.class.php");
        $id=$_GET['idprod'];
        $ic=$_GET['idcollection'];
        $p=Produit::showProposition($id,$ic);
        foreach($p as $v){
          echo "$v";
        }
      ?> 
    </div>
  </section>

  <?php include_once('footer.inc') ?>
    
</body>
</html>