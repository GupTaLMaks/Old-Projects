<?php
session_start();
require_once("Panier.class.php");
require_once("Commande.class.php");
$nc=$_SESSION['numclient'];
if (isset($_SESSION['numclient']) && $_SESSION['numclient']!="") {
	$panier=Panier::produitPanier($nc);
	if ($panier!=NULL) {
		$pt=Panier::prixPanier($nc);
		Commande::addCommande($nc,$pt);
		$ncd=Commande::lastCommande($nc);
		foreach($panier as $v){
			Commande::enterCommande($ncd,$v->idprod,$v->quantite);
		}
		Panier::deletePanier($nc);
		echo "<script type='text/javascript'>window.alert('Commande effectué');</script>";
	}
	echo "<script type='text/javascript'>window.alert('Le panier est vide');</script>";
}
?>