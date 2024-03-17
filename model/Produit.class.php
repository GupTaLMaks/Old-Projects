<?php
	require_once("PDOConnexion.class.php");
	PDOConnexion::setParameters("22002914_0","22002914","shoe3aequ9eiGh8I");
	class Produit {
		private $idprod;
		private $nomprod;
		private $prix;
		private $description;
		private $ref;
		private $img;
		private $stock;
		private $dateajout;
		private $idcollection;
		private $collection;

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
			<a class=\"b\" href=\"produit.php?idprod={$this->idprod}&idcollection={$this->idcollection}\">
			<div>
            	<img src=\"{$this->img}\" style=\"width: 100%;\"/>
            	<p class=\"t1\">Tote {$this->nomprod}</p>
            	<img class=\"t2\" src=\"images/icons/panier.png\" style=\"width: 10%;\"/>
            	<p class=\"t3\">{$this->prix} €</p>
        	</div>
        	</a>";
		}
		public function echoPageProduit($id) {
			$s="
			<div id=\"image\"><img src=\"{$this->img}\" style=\"width: 100%;\"/></div>
    		<div class=\"text\">
      			<h2>Tote {$this->nomprod}</h2>
      			<p id=\"prix\">{$this->prix} €</p>
      			<p id=\"stock\">";
      		if (Produit::inStock($id)>=1) {
      			$s.="En stock";
      		}
      		else $s.="Rupture de stock";
      		$s.="</p>
      			<p id=\"description\">{$this->description}</p>
			";
			$s.="<div class=\"bouton\"><input type=\"button\" value=\"Ajouter au panier\" onclick=\"addPanier()\"";
			if (Produit::inStock($id)==0) {
      			$s.="disabled";
      		}
			$s.="><img id=\"coeur\" src=\"";
			if (isset($_SESSION['numclient']) && $_SESSION['numclient']!="") {
				if (Produit::isFavori($_SESSION['numclient'],$id)==NULL) $s.="images/icons/coeur.png";
				else  $s.="images/icons/coeurfav.png";
			}
			else  $s.="images/icons/coeur.png";
			$s.="\" onclick=\"addFavori()\"/></div>
			<div><label for=\"q\">Quantité :<label>
			<select id=\"q\" name=\"q\">";
			for ($i=1; $i <= Produit::inStock($id); $i++) { 
				$s.="<option value =\"{$i}\">{$i}</option>";
			}
			$s.="</select>
			</div>";
			echo $s;
		}
		
		public static function showBestSellers($i) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, c.collection FROM produits as p, collections as c WHERE p.idcollection=c.idcollection LIMIT $i";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			return $sth->fetchAll();
		}

		public static function showNews($i) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, c.collection FROM produits as p, collections as c WHERE p.idcollection=c.idcollection ORDER BY p.dateajout DESC LIMIT $i";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			return $sth->fetchAll();
		}

		public static function showCollection($i) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, c.collection FROM produits as p, collections as c WHERE p.idcollection=c.idcollection AND c.idcollection=$i";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			return $sth->fetchAll();
		}
		public static function showProposition($i,$c) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, c.collection FROM produits as p, collections as c WHERE p.idcollection=c.idcollection AND p.idprod!=$i AND c.idcollection=$c ORDER BY RAND() LIMIT 2";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			return $sth->fetchAll();
		}
		public static function inStock($id){
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, c.collection FROM produits as p, collections as c WHERE p.idcollection=c.idcollection AND p.idprod=$id";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			$res = $sth->fetch();
			return $res->stock;
		}

		public static function pageProduit($id){
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, c.collection FROM produits as p, collections as c WHERE p.idcollection=c.idcollection AND p.idprod=$id";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			$res=$sth->fetch();
			$res->echoPageProduit($res->idprod);
		}

		public static function showFavoris($i) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, c.collection FROM produits as p, collections as c, favoris as f WHERE p.idcollection=c.idcollection AND f.numclient=$i AND f.idprod=p.idprod";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			return $sth->fetchAll();
		}

		public static function isFavori($nc,$id) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, c.collection FROM produits as p, collections as c, favoris as f WHERE p.idcollection=c.idcollection AND f.numclient=$nc AND f.idprod=p.idprod AND f.idprod=$id";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			return $sth->fetch();
			
		}
		
		public static function addFavori($nc,$id) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT p.*, c.collection FROM produits as p, collections as c, favoris as f WHERE p.idcollection=c.idcollection AND f.numclient=$nc AND f.idprod=p.idprod AND f.idprod=$id";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
			$sth->execute();
			$res=$sth->fetch();
			if ($res==NULL) {
				$sql2="INSERT INTO favoris (numclient, idprod) VALUES ($nc,$id)";
				$sth2 = $db->prepare($sql2);
				$sth2->execute();
			} else {
				$sql2="DELETE FROM favoris WHERE numclient=$nc AND idprod=$id";
				$sth2 = $db->prepare($sql2);
				$sth2->execute();
			}
			
		}

		public static function searchProduit($t) {
		$db = PDOConnexion::getInstance();
		$sql="SELECT * FROM produits WHERE nomprod like :t";
		$sth = $db->prepare($sql);
		$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Produit');
		$sth->execute(array(":t"=>$t."%"));
		return $sth->fetchAll();
	}
	}
?>