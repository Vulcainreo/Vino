<h1>Home page</h1>
<?php
	$idBouteille = (isset($_GET['idBouteille'])) ? $_GET['idBouteille'] : "";
	$bouteille = json_decode($bdd->getBouteilleById(1), true);
?>
<h3>Le stock</h3>
<?php echo $fonctionAffichage->generateDerniereBouteille($bdd) ?>
<h3>Fiche technique</h3>
<table class="table table-striped">
	<tr>
		<td rowspan="7"><img src="<?php echo $bouteille[0]['photo'] ?>"/></td>
		<td>Millénisme : </td>
		<td><?php echo $bouteille[0]['millenisme'] ?></td>
	</tr>
	<tr>
		<td>Type : </td>
		<td><?php echo $bouteille[0]['type'] ?></td>
	</tr>
	<tr>
		<td>Région : </td>
		<td><?php echo $bouteille[0]['region'] ?></td>
	</tr>
	<tr>
		<td>Cépage : </td>
		<td><?php echo $bouteille[0]['cepage'] ?></td>
	</tr>
	<tr>
		<td>Contenance : </td>
		<td><?php echo $bouteille[0]['contenance'] ?></td>
	</tr>
	<tr>
		<td>Volume d'alcool : </td>
		<td><?php echo $bouteille[0]['volumeAlcool'] ?></td>
	</tr>
	<tr>
		<td>Température de service : </td>
		<td><?php echo $bouteille[0]['temperatureService'] ?></td>
	</tr>
</table>

<h3>Emplacements</h3>
<div class="emplacement">
	<?php
		$matrice->setEmplacement($bouteille[0]['emplacement']);
		$matrice->affiche();
	?>
</div>