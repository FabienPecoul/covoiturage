<?php
//var_dump ($_POST);
if (empty($_POST["vil_num1"])){ //premier appel

$pdo=new Mypdo();
$villeManager = new VilleManager($pdo);
$villes= $villeManager->getAllVille();
?>
<div class="sstitre"><h1>Ajouter un parcours</h1></div>

<form action="index.php?page=5" id="insert" method="post">

	Ville 1 :  <select  name="vil_num1"  id="vil_num1">
		<?php foreach ($villes as $ville) {
		?>
			<option value="<?php echo $ville->getVilNum() ?>"> <?php echo $ville->getNom() ?> </option>
		<?php } ?>
	</select>
	Ville 2 :  <select  name="vil_num2"  id="vil_num2">
		<?php foreach ($villes as $ville) { ?>
			<option value="<?php echo $ville->getVilNum() ?>"> <?php echo $ville->getNom() ?> </option>
		<?php } ?>
	</select>
	Nombre de kilomètre(s)  <input type="number" name="par_km"  id="par_km" size="22"> <br /> <br /> 

	<input type="submit" value="Valider"/>

	</form>
	<br />
<?php
}
else
	{
	$pdo=new Mypdo();
	$ParcoursManager = new ParcoursManager($pdo);
	$Parcours = new Parcours($_POST);
	$retour=$ParcoursManager->add($Parcours);	//on appelle la méthode add en lui passant un objet client

	if ($retour !=0) //retour contient le nombre de lignes affectées
	 echo "Le parcours a été ajouté" ;
	 else
	 echo "problème";
}

?>