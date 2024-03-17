<?php
session_start();
require_once("Panier.class.php");
$nc=$_SESSION['numclient'];
$id=$_GET['idprod'];
$q=$_GET['quantite'];
if (isset($_SESSION['numclient']) && $_SESSION['numclient']!="") {
	Panier::addProduit($nc,$id,$q);
	echo "<script type='text/javascript'>window.alert('Produit ajouté au panier');</script>";

}
else echo "<script type='text/javascript'>window.alert('Connectez-vous pour ajouter des produits');</script>";
?>