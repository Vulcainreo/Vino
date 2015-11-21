<h1>Gestion des bouteilles</h1>

<!-- TRAITEMENT DES VARIABLES-->
<?php
	if (isset($_GET['page']) && isset($_GET['action']))
	{
		$action = $_GET['action'];

		$id = (isset($_POST['id'])) ? $_POST['id'] : "";
		$nom = (isset($_POST['nom'])) ? $_POST['nom'] : "";
		$qrcode = (isset($_POST['qrcode'])) ? $_POST['qrcode'] : "";
		$region = (isset($_POST['region'])) ? $_POST['region'] : "";
		$type = (isset($_POST['type'])) ? $_POST['type'] : "";
		$millenisme = (isset($_POST['millenisme'])) ? $_POST['millenisme'] : "";
		$cepage = (isset($_POST['cepage'])) ? $_POST['cepage'] : "";
		$contenance = (isset($_POST['contenance'])) ? $_POST['contenance'] : "";
		$volumeAlcool = (isset($_POST['volumeAlcool'])) ? $_POST['volumeAlcool'] : "";
		$temperatureService = (isset($_POST['temperatureService'])) ? $_POST['temperatureService'] : "";
		$stock = (isset($_POST['stock'])) ? $_POST['stock'] : "";

		$data = array($id, $nom, $qrcode, $region, $type, 
						$millenisme, $cepage, $contenance, $volumeAlcool, 
							$temperatureService, $stock);
		switch ($action)
		{
			case "ajout":
				$bdd->ajoutBouteille(json_encode($data));
				break;
			case 'modif':
				$bdd->modifBouteille(json_encode($data));
				break;
			default :
				break;
		}
		
	}	
?>

<!-- AFFICHAGE-->
<h3>Etat des stocks</h3>
	<a href="?page=modification">Ajouter une bouteille</a>
	<?php echo $fonctionAffichage->generateListeStock($bdd) ?>


<!-- MODAL
<div class="modal fade" id="gestionBouteilleModal" tabindex="-1" role="dialog" aria-labelledby="gestionBouteilleModal">
 	<div class="modal-dialog" role="document">
    	<div class="modal-content">
     	 	<div class="modal-header">
     	 		<button type="button" class="close" data-dismiss="modal" aria-label="Retour"><span aria-hidden="true">&times;</span></button>
     			<h4 class="modal-title" id="myModalLabel">Ajout d'une bouteille</h4>
     	 	</div>
    		<div class="modal-body">
				
    		</div>
  		</div>
 	</div>
</div>-->