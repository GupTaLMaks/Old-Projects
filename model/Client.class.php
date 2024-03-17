<?php
	require_once("PDOConnexion.class.php");
	require_once("hash.php");
	PDOConnexion::setParameters("22002914_0","22002914","shoe3aequ9eiGh8I");
	class Client {
		private $numclient;
		private $email;
		private $mdp;
		private $nom;
		private $prenom;
		private $tel;
		private $numadresse;
		private $typevoie;
		private $nomvoie;
		private $cp;
		private $ville;
		private $pays;

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
		
		public static function register($email,$mdp,$nom,$prenom,$tel,$numadresse,$typevoie,$nomvoie,$cp,$ville,$pays) {
			$mdp=encrypt($mdp,'k59ezR742DbYU');
			$db = PDOConnexion::getInstance();
			$sql="INSERT INTO clients (email, mdp, nom, prenom, tel, numadresse, typevoie, nomvoie, cp, ville, pays) VALUES (:email,:mdp,:nom,:prenom,:tel,:numadresse,:typevoie,:nomvoie,:cp,:ville,:pays)";
			$sth = $db->prepare($sql);
			$sth->execute(array(":email"=>$email,":mdp"=>$mdp,":nom"=>$nom,":prenom"=>$prenom,":tel"=>$tel,":numadresse"=>$numadresse,":typevoie"=>$typevoie,":nomvoie"=>$nomvoie,":cp"=>$cp,":ville"=>$ville,":pays"=>$pays));
		}
		public static function login($email,$mdp) {
			$db = PDOConnexion::getInstance();
			$sql="SELECT * from clients where email=:email";
			$sth = $db->prepare($sql);
			$sth->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Client');
			$sth->execute(array(":email"=>$email));
			$user=$sth->fetch();
			if ($mdp==decrypt($user->mdp,'k59ezR742DbYU')){
				session_start();
				$_SESSION['numclient']=$user->numclient;
				$_SESSION['nom']=$user->nom;
				$_SESSION['prenom']=$user->prenom;
			}
			else echo "<script>alert(\"Erreur de connexion, réessayez\");</script>";;
		}
		public static function deletecompte($id) {
			$db = PDOConnexion::getInstance();
			$sql="DELETE FROM clients WHERE numclient=:id";
			$sth = $db->prepare($sql);
			$sth->execute(array(":id"=>$id));
		}
	}
?>