Division<?php
class DivisionManager{
	private $dbo;

	public function __construct($db){
		$this->db = $db;
	}
	public function add($division){

			$requete = $this->db->prepare(
			'INSERT INTO Etudiant (div_nom) VALUES (:div);');

			$requete->bindValue(':div', $division->getDivNom());

			$retour=$requete->execute();
		//var_dump($requete->debugDumpParams());
		return $retour;
	}

	public function getAllDivisions(){
		$listeDivision = array();

		$sql = 'SELECT div_num, div_nom FROM Division ORDER BY 1';

		$requete = $this->db->prepare($sql);
		$requete->execute();

		while ($division = $requete->fetch(PDO::FETCH_OBJ))
				$listeDivision[] = new Division($division);

		$requete->closeCursor();
		return $listeDivision;
	}

	public function getNomDivision($id) {
		$sql = 'SELECT div_nom FROM Division d JOIN Etudiant e ON d.div_num=e.div_num WHERE d.div_num="$id"';
		$requete = $this->db->prepare($sql);
		$requete->execute();
		$nomDivision= $requete->fetch(PDO::FETCH_OBJ);
		$requete->closeCursor();
		return $nomDivision;
	}

}
