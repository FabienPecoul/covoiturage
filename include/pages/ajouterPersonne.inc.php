<?php
//var_dump ($_POST);
if (empty($_POST["per_nom"])){ //premier appel
?>
	<div class="sstitre"><h1>Ajouter une personne</h1></div>

	<form action="index.php?page=1" id="insert" method="post">

		Nom :       <input type="text" name="per_nom"  id="per_nom" size="11">
		Prenom :    <input type="text" name="per_prenom" id="per_prenom" size="11"> <br />
		Téléphone : <input type="text" name="per_tel" id="per_tel" size="11">
		Mail :      <input type="email" name="per_mail" id="per_mail" size="11"> <br />
		Login :     <input type="text" name="per_login" id="per_login" size="11">
		Password :  <input type="password" name="per_pwd" id="per_pwd" size="11"> <br />

		Catégorie :	<input type="radio" name="statut" id="etu" value="Etudiant"> Etudiant
			<input type="radio" name="statut" id="sal" value="Personnel"> Personnel

		<br />
		<input type="submit" value="Valider"/>
	</form>
	<br />
<?php
} else if ($_POST["statut"] = "Etudiant"){
	$pdo = new Mypdo();
	$personneManager = new PersonneManager($pdo);
	$personne = new Personne($_POST);
	$retour=$personneManager->add($personne);	//on appelle la méthode add en lui passant un objet client

?>
	<div class="sstitre"><h1>Ajouter un étudiant</h1></div>

	<form action="index.php?page=5" id="insert" method="post">

<?php
		$divisionManager = new DivisionManager($pdo);
		$divisions = $divisionManager->getAllDivisions();
		$departementManager = new DepartementManager($pdo);
		$departements = $departementManager->getAllDepartements();
?>

		Année :  <select  name="div_num"  id="div_num">
		<?php foreach ($divisions as $division) {
		?>
			<option value="<?php echo $division->getDivNom() ?>"> <?php echo $division->getDivNom() ?> </option>
		<?php
		}
		?>
		</select>

		Département :  <select  name="dep_num"  id="dep_num">
		<?php foreach ($departements as $departement) {
		?>
			<option value="<?php echo $departement->getDepNom() ?>"> <?php echo $departement->getDepNom() ?> </option>
		<?php
		}
		?>
		</select>
		<br />
		<input type="submit" value="Valider"/>
	</form>
	<br />

<?php

	if ($retour !=null) {//retour contient le nombre de lignes affectées
	 echo "La personne a été ajoutée." ;
	} else {
	 echo "problème";
	}

} else if ((!empty($_POST["dep_num"])) {
	$pdo = new Mypdo();
	$etudiantManager = new EtudiantManager($pdo);
	$etudiant = new Etudiant($_POST);
	$retour=$etudiantManager->add($etudiant);	//on appelle la méthode add en lui passant un objet client

} else if ($_POST["statut"]="Personnel") {

	$pdo=new Mypdo();
	$personneManager = new PersonneManager($pdo);
	$personne = new Personne($_POST);
	$retour=$personneManager->add($personne);	//on appelle la méthode add en lui passant un objet client

?>
	<div class="sstitre"><h1>Ajouter un salarié</h1></div>

	<form action="index.php?page=5" id="insert" method="post">

<?php
		$fonctionManager = new FonctionManager($pdo);
		$fonctions = $fonctionManager->getAllFonctions();
?>
		Téléphone professionnel : <input type="text" name="sal_telprof" id="sal_telprof" size="11">
		<br />

		Fonction :  <select  name="for_num"  id="for_num">
		<?php foreach ($fonctions as $fonction) {
		?>
			<option value="<?php echo $fonction->getFonLib() ?>"> <?php echo $fonction->getFonLib() ?> </option>
		<?php
		}
		?>
		</select>

		<br />
		<input type="submit" value="Valider"/>
	</form>
	<br />

<?php
	if ($retour !=null) {//retour contient le nombre de lignes affectées
	 echo "La personne a été ajoutée." ;
	} else {
	 echo "problème";
	}

} else if ((!empty($_POST["fon_num"])) {
	$pdo = new Mypdo();
	$salarieManager = new SalarieManager($pdo);
	$salarie = new Salarie($_POST);
	$retour=$salarieManager->add($salarie);	//on appelle la méthode add en lui passant un objet client

} else {
	?>
	<div class="sstitre"><h1>Ajouter une personne</h1></div>

	<form action="index.php?page=1" id="insert" method="post">

		Nom :       <input type="text" name="per_nom"  id="per_nom" size="11">
		Prenom :    <input type="text" name="per_prenom" id="per_prenom" size="11"> <br />
		Téléphone : <input type="text" name="per_tel" id="per_tel" size="11">
		Mail :      <input type="email" name="per_mail" id="per_mail" size="11"> <br />
		Login :     <input type="text" name="per_login" id="per_login" size="11">
		Password :  <input type="password" name="per_pwd" id="per_pwd" size="11"> <br />

		Catégorie :	<input type="radio" name="statut" id="etu" value="Etudiant"> Etudiant
			<input type="radio" name="statut" id="sal" value="Personnel"> Personnel

		<br />
		<input type="submit" value="Valider"/>
		<br />
		Erreur lors de la saisie : Aucun champ de rempli
	</form>
	<br />
	<?php
}
?>
