<?php
class EtudiantManager{
	private $dbo;

	public function __construct($db){
		$this->db = $db;
	}
			public function add($etudiant){

					$requete = $this->db->prepare(
					'INSERT INTO Etudiant (dep_num, div_num) VALUES (:dep, :div);');

					$requete->bindValue(':dep', $etudiant->getDepNum());
					$requete->bindValue(':div', $etudiant->getDivNum());

					$retour=$requete->execute();
				//var_dump($requete->debugDumpParams());
				return $retour;
			}

			public function trouverEtudiant($id) {
				$sql = 'SELECT per_nom FROM Etudiant e JOIN Personne p ON e.per_num=p.per_num WHERE per_num="$id"';

				$requete = $this->db->prepare($sql);
				$requete->execute();
				$nomEtudiant= $requete->fetch(PDO::FETCH_OBJ);
				$requete->closeCursor();
				return $nomEtudiant;
			}

			public function getNomDivision($id) {
				$sql = 'SELECT div_nom FROM Division d JOIN Etudiant e ON d.div_num=e.div_num WHERE e.per_num="$id"';
				$requete = $this->db->prepare($sql);
				$requete->execute();
				$nomDivision= $requete->fetch(PDO::FETCH_OBJ);
				$requete->closeCursor();
				return $nomDivision;
			}

			public function getNomDepartement($id) {
				$sql = 'SELECT dep_nom FROM Departement d JOIN Etudiant e ON d.dep_num=e.dep_num WHERE e.per_num="$id"';
				$requete = $this->db->prepare($sql);
				$requete->execute();
				$nomDepartement= $requete->fetch(PDO::FETCH_OBJ);
				$requete->closeCursor();
				return $nomDepartement;
			}

	public function getAllEtudiant(){
					$listeEtudiant = array();

					$sql = 'SELECT per_num, per_nom FROM Etudiant p JOIN Etudiant v ON smthg ORDER BY 1';

					$requete = $this->db->prepare($sql);
					$requete->execute();

					while ($etudiant = $requete->fetch(PDO::FETCH_OBJ))
							$listeEtudiant[] = new Etudiant($etudiant);

					$requete->closeCursor();
					return $listeEtudiant;
				}

	public function getNbEtudiant() {

		$sql = 'SELECT count(*) as nbEtudiant FROM Etudiant' ;

		$requete = $this->db->prepare($sql);
					$requete->execute();

					$nbEtudiant = $requete->fetch(PDO::FETCH_OBJ);
					$requete->closeCursor();
					return $nbEtudiant->nbEtudiant;

	}

}


?>
