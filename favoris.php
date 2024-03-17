<?php session_start();?><!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/nostotes.css"/>
<link rel="stylesheet" type="text/css" href="css/base.css"/>
<title>Tote World</title>
</head>
<body>

   <?php include_once('header.inc');
      if (!isset($_SESSION['numclient']) || $_SESSION['numclient']=="") {echo "<script type='text/javascript'>document.location.replace('connexion.php');</script>";}
   ?>

    <div class="favoris">
         <h3>MES FAVORIS</h3>
         </div>
         <div class="totes">
            <?php
               require_once('model/Produit.class.php');
               $c=Produit::showFavoris($_SESSION['numclient']);
               foreach($c as $v){
                  echo "$v";
               }
            ?>     
         </div>

   <?php include_once('footer.inc') ?>