<?php
//var_dump ($_POST);
if (empty($_POST["vil_nom"])){ //premier appel
?>
<div class="sstitre"><h1>Ajouter une ville</h1></div>

<form action="index.php?page=7" id="insert" method="post">

	Nom :  <input type="text" name="vil_nom"  id="vil_nom" size="22">
	<input type="submit" value="Valider"/>
</form>
<br />
<?php
} else
{
$pdo=new Mypdo();
$villeManager = new VilleManager($pdo);
$ville = new Ville($_POST);
$retour=$villeManager->add($ville);	//on appelle la méthode add en lui passant un objet client



if ($retour !=0) //retour contient le nombre de lignes affectées
 echo "La ville a été ajoutée" ;
 else
 echo "problème";
}

?>