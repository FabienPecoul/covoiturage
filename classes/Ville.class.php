<?php
class Ville{
// Attributs
private $vil_num;
private $vil_nom;

public function __construct($valeurs = array()){
	if (!empty($valeurs))
			//print_r ($valeurs);
			 $this->affecte($valeurs);
}
public function affecte($donnees){
			foreach ($donnees as $attribut => $valeur){
					switch ($attribut){
							case 'vil_num': $this->setVilNum($valeur); break;
							case 'vil_nom': $this->setNom($valeur); break;
							
					}
			}
	}
public function getVilNum() {
        return $this->vil_num;
    }
public function setVilNum($id){
        $this->vil_num=$id;
    }

public function getNom(){
        return $this->vil_nom;
    }
public function setNom($nom){
        $this->vil_nom = $nom;
    }

}
