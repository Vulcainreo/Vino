<?php
	class FonctionAffichage
	{
		public function __construct()
		{

		}

		public function generateListeMillenisme($bdd)
		{
			$json = json_decode($bdd->getAllMillenisme(), true);
			$result = '<select id="millenisme" name="millenisme">';
			foreach($json as $data)
			{
			   $result .= '<option value="'.$data['date'].'">'.$data['date'].'</option>';
			}
			return $result.'</select>';
		}

		public function generateListeType($bdd, $id=0)
		{
			$json = json_decode($bdd->getAllType(), true);
			$result = '<select id="type" name="type">';
			foreach($json as $data)
			{

				if ($data['type'] == $id)
			   		$result .= '<option value="'.$data['id'].'" selected="selected">'.$data['type'].'</option>';
			   	else
			   		$result .= '<option value="'.$data['id'].'">'.$data['type'].'</option>';
			}
			return $result.'</select>';
		}

		public function generateListeRegion($bdd, $id=0)
		{
			$json = json_decode($bdd->getAllRegion(), true);
			$result = '<select id="region" name="region">';
			foreach($json as $data)
			{
				if ($data['region'] == $id)
					$result .= '<option value="'.$data['id'].'" selected="selected">'.$data['region'].'</option>';
				else
					$result .= '<option value="'.$data['id'].'">'.$data['region'].'</option>';
			}
			return $result.'</select>';
		}

		public function generateListeCepage($bdd)
		{
			$json = json_decode($bdd->getAllCepage(), true);
			$result = '<select id="cepage" name="cepage">';
			foreach($json as $data)
			{
			   $result .= '<option value="'.$data['id'].'">'.$data['nom'].'</option>';
			}
			return $result.'</select>';
		}

		public function generateListeStock($bdd)
		{
			$json = json_decode($bdd->getAllStock(), true);
			$result = '<table class="table table-striped">
							<th>Action</th>
							<th>Nom</th>
							<th>Région</th>
							<th>Cépage</th>
							<th>Contenance</th>
							<th>Quantité restante</th>';

			foreach($json as $data)
			{
			   	$result .= '<input type="hidden" name="idBouteille" value="'.$data['id'].'"/>
			   				<tr>
			   					<td>
			   						<a href="index.php?page=modification&idBouteille='.$data['id'].'">
			   							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			   						</a>
			   					</td>
			 			  		<td>
			 			  			<a href="index.php?idBouteille='.$data['id'].'">
			 			  				'.$data['nom'].'
			 			  			</a>
			 			  		</td>
				   				<td>'.$data['region'].'</td>
				   				<td>'.$data['cepage'].'</td>
				   				<td>'.$data['contenance'].'</td>
				   				<td>
				   					<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="'.$data['stock'].'" aria-valuemin="0" aria-valuemax="12" style="width: '.($data['stock']*10).'%;">
										    '.$data['stock'].'
										</div>
									</div>
			   					</td>
			   				</tr>';
			}
			return $result."</table>";
		}

		public function generateDerniereBouteille($bdd)
		{
			$json = json_decode($bdd->getAllStock(), true);
			$result = '<table class="table table-striped">
							<th>Nom</th>
							<th>Région</th>
							<th>Cépage</th>
							<th>Contenance</th>
							<th>Quantité restante</th>';

			foreach($json as $data)
			{
			   	$result .= '<tr>
			 			  		<td>
			 			  			<a href="index.php?idBouteille='.$data['id'].'">
			 			  				'.$data['nom'].'
			 			  			</a>
			 			  		</td>
				   				<td>'.$data['region'].'</td>
				   				<td>'.$data['cepage'].'</td>
				   				<td>'.$data['contenance'].'</td>
				   				<td>
				   					<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="'.$data['stock'].'" aria-valuemin="0" aria-valuemax="12" style="width: '.($data['stock']*10).'%;">
										    '.$data['stock'].'
										</div>
									</div>
			   					</td>
			   				</tr>';
			}
			return $result."</table>";
		}
	}
?>