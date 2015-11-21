<?php
	class MatriceRangement
	{
		public $bdd;
		public $arrayNom = "";
		public $arrayPosition = array();
		public $maxX;
		public $maxY;

		public function __construct($bdd)
		{
			$this->bdd = $bdd;
		}

		public function setTaille($x, $y)
		{
			$this->maxX = $x;
			$this->maxY = $y;
		}

		public function setEmplacement($emplacement)
		{
			$this->decompress($emplacement);
		}

		// séparation des emplacements : #
		// séparation du titre : ||
		// spéaration des coordonnées : |
		// séparation des abssices et ordonnées : ;
		public function decompress($emplacement)
		{
			$this->maxX = 8;
			$this->maxY = 8;

			$emplacementArray = explode("||", $emplacement);
			$infoEmplacement = json_decode($this->bdd->getInfoEmplacement($emplacementArray[0]), true);

			$this->arrayNom = $infoEmplacement[0]['nomLieu'].' - '.$infoEmplacement[0]['nomEmplacement'];
			$this->arrayPosition = explode("|", $emplacementArray[1]);
		}

		public function affiche()
		{
			echo '<h4>'.$this->arrayNom.'</h4>';
			echo '<table class="matriceRangement">';
			for ($i = -1; $i <= $this->maxX+1; $i++) {
			    echo '<tr class="matriceY">';
	    		for ($j = 0; $j <= $this->maxY; $j++) {
	    			// Affichage des numéros de ligne
	    			if ($j ==0)
	    				echo '<td>'.$i.' -></td>';
	    			// Affichage des numéros de colonne
	    			if ($i == -1)
		    			echo '<td>'.$j.'</td>';
		    		else
	    			{
	    				$position = $i.';'.$j;
	    				if (in_array($position, $this->arrayPosition))
			    			echo '<td id="'.$i.'-'.$j.'" class="positionBouteille"></td>';
			    		else
			    			echo '<td id="'.$i.'-'.$j.'" class="positionVide"></td>';
			    	}
	    		}
				echo '</tr>';
			}
		}
	}
?>