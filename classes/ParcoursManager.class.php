<?php
class ParcoursManager{
		private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
        public function add($parcours){
            $requete = $this->db->prepare(
						'INSERT INTO parcours (par_km,vil_num1, vil_num2) VALUES (:km, :num1 , :num2);');

            $requete->bindValue(':km', $parcours->getParKm());
            $requete->bindValue(':num1', $parcours->getVilNum1());
            $requete->bindValue(':num2', $parcours->getVilNum2());

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

		public function getAllParcours(){
            $listeParcours = array();

            $sql = 'SELECT par_num, v1.vil_nom as vil_num1, v2.vil_nom as vil_num2, par_km FROM Parcours p JOIN Ville v1 ON p.vil_num1=v1.vil_num JOIN Ville v2 ON p.vil_num2 = v2.vil_num ORDER BY 1';

            $requete = $this->db->prepare($sql);
            $requete->execute();

            while ($Parcours = $requete->fetch(PDO::FETCH_OBJ))
                $listeParcours[] = new Parcours($Parcours);

            $requete->closeCursor();
            return $listeParcours;
					}

		public function getNbParcours() {

			$sql = 'SELECT count(*) as nbParcours FROM Parcours' ;

			$requete = $this->db->prepare($sql);
            $requete->execute();

            $nbParcours = $requete->fetch(PDO::FETCH_OBJ);
            $requete->closeCursor();
            return $nbParcours->nbParcours;
					
		}

	}


?>