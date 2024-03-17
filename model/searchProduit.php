<?php
require_once("Produit.class.php");
$produits=Produit::searchProduit($_GET['t']);
header('Content-type: text/xml; charset=utf-8');
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
echo "<produits>";
foreach ($produits as $v) {
	echo "<produit><idprod>{$v->idprod}</idprod></produit><produit><nomprod>{$v->nomprod}</nomprod><idcollection>{$v->idcollection}</idcollection></produit>";
}
echo "</produits>";
?>