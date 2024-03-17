<?php
	require_once("PDOConnexion.class.php");
	//require_once("Client.class.php");
	require_once("Produit.class.php");	
	PDOConnexion::setParameters("22002914_0","22002914","shoe3aequ9eiGh8I");
	class Quantite {
		private $numLQ;
		private $numcom;
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
		public static function produitCom($id) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, q.quantite from produits as p, quantites as q where q.numcom=$id and p.idprod=q.idprod";
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
                </td>
                <td class=\"prix\">{$prix} €</td>
            	</tr>";
            	$prixtot+=$v->prix*$v->quantite;
			}
			return $prixtot;
		}		
	}
?>