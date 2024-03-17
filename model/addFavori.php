<?php
session_start();
require_once("Produit.class.php");
$nc=$_SESSION['numclient'];
$id=$_GET['idprod'];
if (isset($_SESSION['numclient']) && $_SESSION['numclient']!="") Produit::addFavori($nc,$id);
?>