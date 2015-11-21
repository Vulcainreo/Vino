<?php
	class Bdd
	{
		public $bdd = null;
		public $host = "";
		public $dbname = "";
		public $login = "";
		public $mdp = "";

		public function __construct($h, $d, $l, $m)
		{
			$this->host = $h;
			$this->dbname = $d;
			$this->login = $l;
			$this->mdp = $m;
		}

		public function connectBdd()
		{
			try {
				$this->bdd = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8", $this->login, $this->mdp);
			}
			catch (Exception $e)
			{
				echo 'Erreur : ' . $e->getMessage();
			}
		}

		public function deconnectBdd()
		{
			
		}

		public function getAllBouteille()
		{
			$this->connectBdd();
			$sql = "SELECT * FROM bouteille";
			$statement = $this->bdd->prepare($sql);
			$statement->execute();
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($result);

		}

		public function getAllMillenisme()
		{
			$this->connectBdd();
			$sql = "SELECT * FROM millenisme";
			$statement = $this->bdd->prepare($sql);
			$statement->execute();
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($result);
		}

		public function getAllType()
		{
			$this->connectBdd();
			$sql = "SELECT * FROM type";
			$statement = $this->bdd->prepare($sql);
			$statement->execute();
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($result);
		}

		public function getAllRegion()
		{
			$this->connectBdd();
			$sql = "SELECT * FROM region";
			$statement = $this->bdd->prepare($sql);
			$statement->execute();
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($result);
		}

		public function getAllCepage()
		{
			$this->connectBdd();
			$sql = "SELECT * FROM cepage";
			$statement = $this->bdd->prepare($sql);
			$statement->execute();
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($result);
		}

		public function getAllStock()
		{
			$this->connectBdd();
			$sql = "SELECT b.id, b.nom, r.region, c.nom as cepage, b.contenance, b.stock 
					FROM bouteille as b, cepage as c, region as r 
					WHERE c.id = b.cepage AND r.id = b.region";
			$statement = $this->bdd->prepare($sql);
			$statement->execute();
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($result);
		}

		public function ajoutBouteille($json)
		{
			$values = json_decode($json);
			$this->connectBdd();
			$sql = "INSERT INTO bouteille (nom, qrcode, region, 
										   type, millenisme, cepage, 
										   contenance, volumeAlcool, temperatureService, stock) 
					VALUES ('$values[0]', '$values[1]', '$values[2]', 
							'$values[3]', '$values[4]', '$values[5]', 
							'$values[6]', '$values[7]', '$values[8]', '$values[9]')";
	
			$statement = $this->bdd->prepare($sql);
			$statement->execute();

			return $statement;
		}

		public function modifBouteille($json)
		{
			$values = json_decode($json);
			$this->connectBdd();
			$sql = "UPDATE bouteille 
					SET nom = '$values[1]',
						qrcode = '$values[2]', 
						region = '$values[3]',
						type = '$values[4]', 
						millenisme = '$values[5]', 
						cepage = '$values[6]',
						contenance = '$values[7]', 
						volumeAlcool = '$values[8]', 
						temperatureService = '$values[9]', 
						stock = '$values[10]'
					WHERE id = '$values[0]'";
	
			$statement = $this->bdd->prepare($sql);
			$statement->execute();

			return $statement;
		}

		public function getInfoEmplacement($idEmplacement)
		{
			$this->connectBdd();
			$sql = 'SELECT l.nom as nomLieu, 
						   l.description as descriptionLieu, 
						   e.nom as nomEmplacement, 
						   e.tailleX as tailleXEmplacement, 
						   e.tailleY as tailleYEmplacment 
					FROM emplacement as e, lieu  as l
					WHERE e.lieu = l.id AND e.id = "'.$idEmplacement.'"';
			$statement = $this->bdd->prepare($sql);
			$statement->execute();
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($result);
		}

		public function getBouteilleById($idBouteille)
		{
			$this->connectBdd();
			$sql = 'SELECT 
						   b.id as id,
						   b.nom as nom,
						   b.photo as photo,
						   b.qrcode as qrcode,
						   r.region as region,
						   t.type as type,
						   b.millenisme as millenisme,
						   c.nom as cepage,
						   b.contenance as contenance,
						   b.volumeAlcool as volumeAlcool,
						   b.temperatureService as temperatureService,
						   b.stock as stock,
						   b.emplacement as emplacement
					FROM
						   bouteille as b,
						   region as r,
						   cepage as c,
						   type as t
					WHERE
						   t.id = b.type AND
						   r.id = b.region AND
						   c.id = b.cepage AND 
						   b.id = "'.$idBouteille.'"';

			$statement = $this->bdd->prepare($sql);
			$statement->execute();
			
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return json_encode($result);
		}
	}
?>