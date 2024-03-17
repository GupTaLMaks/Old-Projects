<?php
session_start();
require_once("Panier.class.php");
$nc=$_SESSION['numclient'];
$id=$_GET['idprod'];
if (isset($_SESSION['numclient']) && $_SESSION['numclient']!="") {
	Panier::removeProduit($nc,$id);
	echo "<script type='text/javascript'>window.alert('Produit retiré au panier');</script>";

}
else echo "<script type='text/javascript'>window.alert('Connectez-vous pour retirer des produits');</script>";
?>