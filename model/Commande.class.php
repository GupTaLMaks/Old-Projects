<?php
	require_once("PDOConnexion.class.php");
	require_once("Client.class.php");
	PDOConnexion::setParameters("22002914_0","22002914","shoe3aequ9eiGh8I");
	class Commande {
		private $numcom;
		private $numclient;
		private $date;
		private $prix;

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
			return "
			<tr>
				<td><a href=\"detailscommande.php?numcom=$this->numcom\"/>Commande n°{$this->numcom}</a></td>
				<td><a href=\"detailscommande.php?numcom=$this->numcom\"/>Achetée le ".substr($this->date,0,10)." à ". substr($this->date,11,5)."</a></td>
            	<td><a href=\"detailscommande.php?numcom=$this->numcom\"/>{$this->prix} €</a></td>
            </tr>";
		}
		
		public static function addCommande($nc,$p) {
			$db = PDOConnexion::getInstance();
			$sql="INSERT INTO commandes (numclient, date, prix) VALUES ($nc,now(),$p)";
			$sth = $db->prepare($sql);
			$sth->execute();
		}
		public static function getCommandes($nc) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT * FROM commandes WHERE numclient=$nc ";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Commande');
			$sth->execute();
			return $sth->fetchAll();
		}
		public static function lastCommande($nc) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT * FROM commandes WHERE numclient=$nc ORDER BY date DESC LIMIT 1";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Commande');
			$sth->execute();
			$res=$sth->fetch();
			return $res->numcom;
		}
		public static function enterCommande($nc,$id,$q) {
			$db = PDOConnexion::getInstance();
			$sql="INSERT INTO quantites (numcom, idprod, quantite) VALUES ($nc,$id,$q)";
			$sth = $db->prepare($sql);
			$sth->execute();
		}	
	}
?>