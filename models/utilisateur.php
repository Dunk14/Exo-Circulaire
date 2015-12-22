<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/library/db.php');
	class Model_Utilisateur {

		private $db;

		public function __construct() {
			$this->db = DB::getInstance();
		}

		public function existMail ($mail) {
			$query = 'SELECT COUNT(*) FROM client WHERE mail = "'.$mail.'";';
			$existMail = $this->db->get($query);
			if ($existMail == 1) {
				return true;
			} else {
				return false;
			}
		}

		public function getIdClient ($mail) {
			$query = 'SELECT id_client FROM client WHERE mail = "'.$mail.'";';
			$id_client = $this->db->get($query);
			return $id_client;
		}

		public function addUtilisateur ($nom,$prenom,$ville,$adresse,$cp,$mail,$pseudo,$mdp) {
			// Requête d'insertion de la table client
			$queryUtilisateur = 'INSERT INTO client (nom,prenom,ville,adresse,cp,mail) 
			VALUES (:nom,:prenom,:ville,:adresse,:cp,:mail);';

			// Requête d'insertion de la table utilisateurs
			$queryClient = 'INSERT INTO utilisateurs (pseudo,mdp)
			VALUES (:pseudo,:mdp);';
			
			$tabUtilisateur = array(
					'nom' => $nom,
					'prenom' => $prenom,
					'ville' => $ville,
					'adresse' => $adresse,
					'cp' => $cp,
					'mail' => $mail
					);

			$tabClient = array(
					'pseudo' => $pseudo,
					'mdp' => $mdp 
					);

			//Insertion dans les 2 tables
			$resultatUtilisateur = $this->db->insert($queryUtilisateur,$tabUtilisateur);
			$resultatClient = $this->db->insert($queryClient,$tabClient);

			// Récupération de 'id_user'
			$id_client = $this->getIdClient($mail);

			// Requête d'insertion pour relier les 2 occurrences des tables
			$queryForeign = 'UPDATE client SET id_user = '.$tabIds['id_user'].' WHERE id_client = '.$tabIds['id_client'].'';
			$resultatForeign = $this->db->get($queryForeign);

			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/index.php');
		}

	}

?>