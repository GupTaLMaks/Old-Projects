<?php session_start();?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<link rel="stylesheet" type="text/css" href="css/recherche.css"/>
<script src="//cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="//cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

<title>Tote World</title>
</head>
<body>

   <?php include_once('header.inc') ?>

    <section class="edition">
        <img src="images/imgs/toteecolo.png" style="width: 100%;"/>
        <div class="texte">
            <p>EDITION LIMITÉE !</p>
            <p>#savetheworld</p>
            <a href="nostotes.php#stw"><input type="button" value="Je découvre !"></a>
        </div>
    </section>

    <!--<section class="sec1" >
        <div class="recherche">
            <p>QUEL DESIGN VOUS CORRESPOND ?</p>
        </div>

        <form novalidate="novalidate" onsubmit="returnfalse;" class="searchbox">
            <div role="search" class="searchbox__wrapper">
              <input id="search-input" type="search" name="search" placeholder="Rechercher un design..." autocomplete="off" required="required" class="searchbox__input" onkeyup="rechercheProduit()">
              <span type="submit" class="loupe" >
              <svg role="img" aria-label="Search">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#sbx-icon-search-13"></use>
                  </svg>
                </span>
              <button type="reset" title="Clear the search query." class="searchbox__reset hide">
              <svg role="img" aria-label="Reset">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#sbx-icon-clear-3"></use>
                </svg>
              </button>
            </div>
        </form>

        <ul id="list"></ul>
        <script>
          function rechercheProduit(){
          var sF=$("#search-input").val();
          console.log(sF);
          $.get("https://dev-22002914.users.info.unicaen.fr/Toteworld/model/searchProduit.php",{"t": sF},
          function(data){
            var l = data.getElementsByTagName("produit");
            var output = "";
            for (var i=0; i<l.length;i++){
              var r = l[i];
              var np = r.getElementsByTagName('nomprod').nodeValue;
              var id = r.getElementsByTagName('idprod').nodeValue;
              var c = r.getElementsByTagName('idcollection').nodeValue;
              output+="<li href=\"produit.php?idprod="+id+"&idcollection="+c+">"+np+"</li>";
            }
            $("#list").html(output);  
          }
          );
          }
        
        </script>
    </section>-->


    <section class="best_sellers">
      <h3 class="h3sec">NOS BEST-SELLERS</h3>
      <div class="totes">
      <?php
        require_once('model/Produit.class.php');
        $bs=Produit::showBestSellers(3);
        foreach($bs as $v){
          echo "$v";
        }
      ?>
      </div>
    </section>

    <section class="sec4">
      <div class="new">
        <img src="images/imgs/img6.png" style="width: 100%; clip-path: inset(20% 0px 40% 0); transform: translate(0, -20%);"/>
        <div class="newT">
          <h3 class="newH">LES PETITS NOUVEAUX</h3>
          <a href="nostotes.php"><input type="button" value="Je découvre !"></a>
        </div>
      </div>
      <div class="vosd">
        <img src="images/imgs/img6.png" style="width: 100%; clip-path: inset(20% 0px 40% 0); transform: translate(0, -20%);"/>
        <div class="vosdT">
          <h3 class="newH">VOS DESIGNS</h3>
          <a href="nostotes.php"><input type="button" value="Je découvre !"></a>
        </div>
      </div>
    </section>


    <section class="partage" >
      <h3 class="h3sec">VOS PARTAGES</h3>
      <div id="publis">
        <div class="p"> 
          <img src="images/imgs/img4.png" style="width: 100%;"/>
          <p>@elodiedupont</p>
        </div>
        <div class="p"> 
          <img src="images/imgs/img5.png" style="width: 100%;"/>
          <p>@vincent39</p>
        </div>
        <div class="p"> 
          <img src="images/imgs/img3.png" style="width: 100%;"/>
          <p>@francineoutfit</p>
        </div>
      </div>
    </section>

    <section class="vide"></section>

    <?php include_once('footer.inc') ?>
    



</body>
</html>