<?php
	$pdo=new Mypdo();
	$villeManager = new VilleManager($pdo);
	$villes=$villeManager->getAllVille();
	?>
	<div class="sstitre"><h1>Liste des villes</h1></div>

	<p>Actuellement <?php echo $villeManager->getNbVille() ?> villes sont enregistrées</p>

	<table>
		<tr><th>Numéro</th><th>Nom</th></tr>
		<?php
		foreach ($villes as $ville){ ?>
			<tr><td><?php echo $ville->getVilNum();?>
			</td><td><?php echo $ville->getNom();?>
			</td></tr>
		<?php 
		} ?>
	</table>
	<br />

