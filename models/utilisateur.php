<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/library/db.php');
	class Model_Utilisateur {

		private $db;

		public function __construct() {
			$this->db = DB::getInstance();
		}

		public function existMail ($mail) {
			$query = 'SELECT COUNT(*) FROM clients WHERE mail = "'.$mail.'";';
			$existMail = $this->db->get($query);
			if ($existMail[0] == 1) {
				return true;
			} else {
				return false;
			}
		}

		public function existMailUpdate ($mail,$idClient) {
			$query = 'SELECT COUNT(*) FROM clients WHERE mail = "'.$mail.'" AND id_client != "'.$idClient.'";';
			$existMail = $this->db->get($query);
			if ($existMail[0] == 1) {
				return true;
			} else {
				return false;
			}
		}

		public function getIdClient ($mail) {
			$query = 'SELECT id_client FROM clients WHERE mail = "'.$mail.'";';
			$idClient = $this->db->get($query);
			return $idClient;
		}

		public function getIdUtilisateur ($pseudo) {
			$query = 'SELECT id_utilisateur FROM utilisateurs WHERE pseudo = "'.$pseudo.'";';
			$idUtilisateur = $this->db->get($query);
			return $idUtilisateur;
		}

		public function addUtilisateur ($nom,$prenom,$ville,$adresse,$cp,$mail,$pseudo,$mdp,$dateArrivee) {

			// Requête d'insertion de la table client
			$queryUtilisateur = 'INSERT INTO clients (nom,prenom,ville,adresse,cp,mail,dateArrivee) 
			VALUES (:nom,:prenom,:ville,:adresse,:cp,:mail,:dateArrivee);';

			// Requête d'insertion de la table utilisateurs
			$queryClient = 'INSERT INTO utilisateurs (pseudo,mdp)
			VALUES (:pseudo,:mdp);';
			
			$tabUtilisateur = array(
					'nom' => $nom,
					'prenom' => $prenom,
					'ville' => $ville,
					'adresse' => $adresse,
					'cp' => $cp,
					'mail' => $mail,
					'dateArrivee' => $dateArrivee
					);

			$tabClient = array(
					'pseudo' => $pseudo,
					'mdp' => $mdp 
					);

			//Insertion dans les 2 tables
			$resultatUtilisateur = $this->db->insert($queryUtilisateur,$tabUtilisateur);
			$resultatClient = $this->db->insert($queryClient,$tabClient);

			// Récupération de 'id_client' et 'id_utilisateur'
			$idClient = $this->getIdClient($mail);
			$idUtilisateur = $this->getIdUtilisateur($pseudo);

			// Requête d'insertion pour relier les 2 occurrences des tables
			$queryForeign = 'UPDATE clients SET id_utilisateur = '.$idUtilisateur[0].' WHERE id_client = '.$idClient[0].';';
			$resultatForeign = $this->db->get($queryForeign);
		}

		// Fonction permettant de se connecter 
		public function connectUtilisateur ($pseudo,$mdp) {

			// Préparation des requêtes 
			$queryPseudo = 'SELECT COUNT(*) FROM utilisateurs WHERE pseudo = "'.$pseudo.'";';
			$queryMdp = 'SELECT COUNT(*) FROM utilisateurs WHERE mdp = "'.$mdp.'";';

			// Exécution des requêtes
			$resultatPseudo = $this->db->get($queryPseudo);
			$resultatMdp = $this->db->get($queryMdp);
			
			// Vérification de la concordance des résultats obtenus précédemment
			// On regarde si le pseudo et le mdp rentrés sont dans la base
			if ($resultatPseudo[0] >= 1 && $resultatMdp[0] >= 1) {

				// Récupération de 'id_utilisateur'
				$idUtilisateur = $this->getIdUtilisateur($pseudo);

				// Récupération des infos de l'utilisateur/client
				$queryForeign = 'SELECT * FROM clients WHERE id_utilisateur = '.$idUtilisateur[0].';';
				$userConnected = $this->db->get($queryForeign);
				return $userConnected;
			}
			else {
				echo '<h2>Le pseudo et/ou le mot de passe n\'est/ne sont pas correct(s)';
			}
		}

		// Fonction retournant le pseudo
		public function getPseudo ($idUtilisateur) {
			$queryPseudo = 'SELECT pseudo FROM utilisateurs WHERE id_utilisateur = '.$idUtilisateur.';';
			$resultatPseudo = $this->db->get($queryPseudo);
			return $resultatPseudo;
		}

		// Fonction retournant une commande détaillée, spécifique à un utilisateur
		public function viewOrder ($idUtilisateur,$idCommande) {
			$queryCommande = 'SELECT articles.nom, contient.prix FROM articles, contient, commandes 
			WHERE articles.id_article = contient.id_article 
			AND contient.id_commande = commandes.id_commande 
			AND commandes.id_commande = '.$idCommande.'
			AND commandes.id_utilisateur = '.$idUtilisateur.'
			ORDER BY contient.prix;';
			$resultatCommande = $this->db->getAll($queryCommande);

			return $resultatCommande;
		}

		public function updateUtilisateur ($ville,$adresse,$cp,$mail,$idClient) {
			$queryUpdate = 'UPDATE clients SET ville = "'.$ville.'", 
			adresse = "'.$adresse.'", 
			cp = "'.$cp.'", 
			mail = "'.$mail.'"
			WHERE id_client = '.$idClient.';';
			$resultatUpdate = $this->db->get($queryUpdate);
			return $resultatUpdate;
		}

	}

?>