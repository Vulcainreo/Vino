<?php
	if (isset($_GET['idBouteille']))
	{
		$modif = true;
		$idBouteille = $_GET['idBouteille'];
		$bouteille = json_decode($bdd->getBouteilleById($idBouteille), true);
	}
	else
	{
		$modif = false;
	}
?>

<form action=<?php echo "index.php?page=gestion&action=".(($modif) ? "modif" : "ajout") ?>  method="POST">
	<input type="hidden" id="id" name="id" value=<?php echo ($modif) ? '"'.$bouteille[0]['id'].'"' : '""' ?> />
	<table class="table table-striped">
		<tr>
			<td rowspan="10">
				<img src=<?php echo ($modif) ? '"'.$bouteille[0]['photo'].'"' : '""' ?> />
				<input type="file" id="photo"/> 
			</td>
			<td><label for="nom">Nom</label></td>
			<td>
				<input type="text" id="nom" name="nom" value=<?php echo ($modif) ? '"'.$bouteille[0]['nom'].'"' : '""' ?> />
			</td>
		</tr>
		<tr>
			<td><label for="qrcode">Qrcode</label></td>
			<td>
				<input type="text" id="qrcode" name="qrcode" value=<?php echo ($modif) ? '"'.$bouteille[0]['qrcode'].'"' : '""' ?> />
			</td>
		</tr>
		<tr>
			<td><label for="region">Région</label></td>
			<td>
				<?php 
					if ($modif)
					{
						echo($fonctionAffichage->generateListeRegion($bdd,$bouteille[0]['region'])); 
					}
					else
						echo($fonctionAffichage->generateListeRegion($bdd)); 

				?>
			</td>
		</tr>
		<tr>
			<td><label for="type">Type</label></td>
			<td>
				<?php 
					if ($modif)
						echo($fonctionAffichage->generateListeType($bdd,$bouteille[0]['type'])); 
					else
						echo($fonctionAffichage->generateListeType($bdd)); 

				?>
			</td>
		</tr>
		<tr>
			<td><label for="millenisme">Millenisme</label></td>
			<td>
				<?php echo($fonctionAffichage->generateListeMillenisme($bdd)); ?>
		</td>
		<tr>
			<td><label for="cepage">Cépage</label></td>
			<td>
				<?php print_r($fonctionAffichage->generateListeCepage($bdd)); ?>
			</td>
		</tr>
		<tr>
			<td><label for="contenance">Contenance</label></td>
			<td><input id="contenance" name="contenance" type="number" class="form-control" placeholder="75"> cL</td>
		</tr>
		<tr>
			<td><label for="volumeAlcool">Volume d'alcool</label></td>
			<td><input d="volumeAlcool" name="volumeAlcool" type="number" class="form-control" placeholder="10"> %/VOL</td>
		</tr>
		<tr>
			<td><label for="temperatureService">Température de service</label></td>
			<td><input id="temperatureService" name="temperatureService" type="number" class="form-control" placeholder="21"> °C</td>
		</tr>
		<tr>
			<td><label for="stock">Stock</label></td>
			<td><input id="stock" name="stock" type="number" class="form-control" placeholder="6"></td>
		</tr>
		<tr>
			<td><label for="emplacement">Emplacement</label></td>
			<td>
				<?php 
					$matrice->setTaille(4,4);
					$matrice->affiche(); 
				?>
			</td>
		</tr>
	</table>
	<button type="submit" class="btn btn-primary">Soumettre</button>

</form>