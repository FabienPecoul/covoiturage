<?php
//var_dump ($_POST);
if (empty($_POST["per_nom"])){ //premier appel
?>
<div class="sstitre"><h1>Ajouter une personne</h1></div>

<form action="index.php?page=7" id="insert" method="post">

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
} else
{
$pdo=new Mypdo();
$personneManager = new PersonneManager($pdo);
$personne = new Personne($_POST);
$retour=$personneManager->add($personne);	//on appelle la méthode add en lui passant un objet client



if ($retour !=0) //retour contient le nombre de lignes affectées
 echo "La personne a été ajoutée" ;
 else
 echo "problème";
}

?>