<?php
class PersonneManager{
	private $dbo;

	public function __construct($db){
		$this->db = $db;
	}
  public function add($personne){
			$salt="48@!alsd";

      $requete = $this->db->prepare(
			'INSERT INTO Personne (per_nom, per_prenom, per_tel, per_mail, per_login, per_pwd) VALUES (:nom, :prenom, :tel, :mail, :login, :pwd);');

    	$requete->bindValue(':nom', $personne->getPerNom());
			$requete->bindValue(':prenom', $personne->getPerPrenom());
			$requete->bindValue(':tel', $personne->getPerTel());
			$requete->bindValue(':mail', $personne->getPerMail());
			$requete->bindValue(':login', $personne->getPerLogin());
			$requete->bindValue(':pwd', sha1(sha1($personne->getPerPwd()).$salt));

      $retour=$requete->execute();
		//var_dump($requete->debugDumpParams());
		return $retour;
  }

  public function trouverVille($id) {
  	$sql = 'SELECT vil_nom FROM Ville WHERE vil_nom="$id"';

  	$requete = $this->db->prepare($sql);
  	$requete->execute();
  	$nomVille= $requete->fetch(PDO::FETCH_OBJ);
  	$requete->closeCursor();
  	return $nomVille;
  }

	public function getAllPersonne(){
    $listePersonne = array();

    $sql = 'SELECT per_num, per_nom FROM Personne p JOIN Ville v ON smthg ORDER BY 1';

    $requete = $this->db->prepare($sql);
    $requete->execute();

    while ($personne = $requete->fetch(PDO::FETCH_OBJ))
        $listePersonne[] = new Personne($personne);

    $requete->closeCursor();
    return $listePersonne;
	}

	public function getNbPersonne() {

	$sql = 'SELECT count(*) as nbPersonne FROM Personne' ;

	$requete = $this->db->prepare($sql);
  $requete->execute();

  $nbPersonne = $requete->fetch(PDO::FETCH_OBJ);
  $requete->closeCursor();
  return $nbPersonne->nbPersonne;

	}

	public fonction retourID() {
		$id = $this->db->lastInsertId();
		return $id;
	}

}


?>
