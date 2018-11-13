<?php
	$pdo=new Mypdo();
	$parcoursManager = new ParcoursManager($pdo);
	$parcours=$parcoursManager->getAllParcours();
	?>
	<div class="sstitre"><h1>Liste des parcours</h1></div>

	<p>Actuellement <?php echo $parcoursManager->getNbParcours() ?> parcours sont enregistrées</p>

	<table>
		<tr> Numéro <th></th><th> Nom Ville 1 </th><th> Nom Ville 2 </th><th> Nombre de km </th></tr>
		<?php
		foreach ($parcours as $parcours){ ?>
			<tr><td><?php echo $parcours->getParNum();?>
			</td><td><?php echo $parcours->getVilNum1();?>
			</td><td><?php echo $parcours->getVilNum2();?>
			</td><td><?php echo $parcours->getParKm();?>			
			</td></tr>
		<?php 
		} ?>
	</table>
	<br />

