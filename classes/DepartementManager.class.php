<?php
class DepartementManager{
	private $dbo;

	public function __construct($db){
		$this->db = $db;
	}
	public function add($departement){

			$requete = $this->db->prepare(
			'INSERT INTO Departement (dep_nom, vil_num) VALUES (:dep, :vil);');

			$requete->bindValue(':dep', $departement->getDepNom());
			$requete->bindValue(':dep', $departement->getVilNum());

			$retour=$requete->execute();
		//var_dump($requete->debugDumpParams());
		return $retour;
	}

	public function getAllDepartements(){
		$listeDepartement = array();

		$sql = 'SELECT dep_num, dep_nom, vil_num FROM Departement ORDER BY 1';

		$requete = $this->db->prepare($sql);
		$requete->execute();

		while ($departement = $requete->fetch(PDO::FETCH_OBJ))
				$listeDepartement[] = new Departement($departement);

		$requete->closeCursor();
		return $listeDepartement;
	}

	public function getNomDepartement($id) {
		$sql = 'SELECT per_nom FROM Departement d JOIN Etudiant e ON d.dep_num=e.dep_num WHERE d.dep_num="$id"';

		$requete = $this->db->prepare($sql);
		$requete->execute();
		$nomDepartement= $requete->fetch(PDO::FETCH_OBJ);
		$requete->closeCursor();
		return $nomDepartement;
	}

}
