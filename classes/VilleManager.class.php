<?php
class VilleManager{
	private $dbo;

		public function __construct($db){
			$this->db = $db;
		}
        public function add($ville){
            $requete = $this->db->prepare(
						'INSERT INTO ville (vil_nom) VALUES (:nom);');

            $requete->bindValue(':nom',$ville->getNom());

            $retour=$requete->execute();
						// var_dump($requete->debugDumpParams()); // affiche la requete SQL demandé au sgbd
						return $retour;
        }

		public function getAllVille(){
            $listeVilles = array();

            $sql = 'select vil_num, vil_nom FROM ville ORDER BY 2';


            $requete = $this->db->prepare($sql);
            $requete->execute();

            while ($ville = $requete->fetch(PDO::FETCH_OBJ))
                $listeVilles[] = new Ville($ville);

            $requete->closeCursor();
            return $listeVilles;
					}

		public function getNbVille() {

			$sql = 'SELECT count(*) as nbVilles FROM ville' ;

			$requete = $this->db->prepare($sql);
            $requete->execute();

            $nbVilles = $requete->fetch(PDO::FETCH_OBJ);
            $requete->closeCursor();
            return $nbVilles->nbVilles;
					
		}

	}


?>