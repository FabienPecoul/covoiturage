<?php
class PersonneManager{
		private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
        public function add($personne){
            $requete = $this->db->prepare(
						'INSERT INTO Personne (per_num, per_nom, per_prenom, per_tel, per_mail, per_login, per_pwd) VALUES (:num, :nom, :prenom, :tel, :mail, :login, :pwd);');

            $requete->bindValue(':num', $Personne->gzhgHGO());
            $requete->bindValue(':nom', $Personne->gzhgHGO());
			$requete->bindValue(':prenom', $Personne->gzhgHGO());
			$requete->bindValue(':tel', $Personne->gzhgHGO());
			$requete->bindValue(':mail', $Personne->gzhgHGO());
			$requete->bindValue(':login', $Personne->gzhgHGO());
			$requete->bindValue(':pwd', $Personne->gzhgHGO());

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

            $sql = 'SELECT par_num, v1.vil_nom as vil_num1, v2.vil_nom as vil_num2, par_km FROM Personne p JOIN Ville v1 ON p.vil_num1=v1.vil_num JOIN Ville v2 ON p.vil_num2 = v2.vil_num ORDER BY 1';

            $requete = $this->db->prepare($sql);
            $requete->execute();

            while ($Personne = $requete->fetch(PDO::FETCH_OBJ))
                $listePersonne[] = new Personne($Personne);

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

	}


?>