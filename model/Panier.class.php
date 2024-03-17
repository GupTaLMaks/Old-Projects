<?php
	require_once("PDOConnexion.class.php");
	require_once("Produit.class.php");	
	PDOConnexion::setParameters("22002914_0","22002914","shoe3aequ9eiGh8I");
	class Panier {
		private $numLP;
		private $numclient;
		private $idprod;
		private $quantite;

		public function __construct(array $args = array()) {
			foreach ($args as $k => $v) {
				$this->{$k}=$v;
			}
		}
		public function __get($name) {
			return $this->$name;
		}
		public function __set($name,$v) {
			$this->$name = $v;
		}
		public function __toString() {
			return "";
		}
		public static function produitPanier($id) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, sum(pa.quantite) as quantite from produits as p, paniers as pa where pa.numclient=$id and p.idprod=pa.idprod GROUP BY pa.idprod";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			return $sth->fetchAll();
		}

		public static function lignePanierById($id) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, sum(pa.quantite) as quantite from produits as p, paniers as pa where pa.numclient=$id and p.idprod=pa.idprod GROUP BY pa.idprod";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			$res=$sth->fetchAll();
			$prixtot=0;
			foreach($res as $v){
				$prix=$v->prix*$v->quantite;
				echo "<tr>
                <td colspan=\"2\">
                    <img id=\"img\" src=\"{$v->img}\" style=\"width: 100%;\"/>
                    <p id=\"titre\">Tote {$v->nomprod}</p>
                    <p id=\"qt\">Quantité : {$v->quantite}</p>
                    <img id=\"{$v->idprod}\" class=\"corbeille\" src=\"images/icons/corbeille.png\" onclick=\"removePanier()\"/>
                </td>
                <td class=\"prix\">{$prix} €</td>
            	</tr>";
            	$prixtot+=$v->prix*$v->quantite;
			}
			return $prixtot;
		}
		public static function prixPanier($id) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, sum(pa.quantite) as quantite from produits as p, paniers as pa where pa.numclient=$id and p.idprod=pa.idprod GROUP BY pa.idprod";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			$res=$sth->fetchAll();
			$prixtot=0;
			foreach($res as $v){
            	$prixtot+=$v->prix*$v->quantite;
			}
			return $prixtot;
		}

		public static function addProduit($nc,$id,$q) {
			$db = PDOConnexion::getInstance();
			$sql="INSERT INTO paniers (numclient, idprod, quantite) VALUES ($nc,$id,$q)";
			$sth = $db->prepare($sql);
			$sth->execute();
		}
		
		public static function removeProduit($nc,$id) {
			$db = PDOConnexion::getInstance();
			$sql="DELETE FROM paniers WHERE numclient=$nc AND idprod=$id";
			$sth = $db->prepare($sql);
			$sth->execute();
		}

		public static function deletePanier($nc) {
			$db = PDOConnexion::getInstance();
			$sql="DELETE FROM paniers WHERE numclient=$nc";
			$sth = $db->prepare($sql);
			$sth->execute();
		}		
	}
?>