<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/library/db.php');
	class Model_Admin {
		
		private $db;

		public function __construct() {
			$this->db = DB::getInstance();
		}

		public function getIdAdmin($mail) {
			$query = 'SELECT * FROM administrateurs WHERE mail = "'.$mail.'";';
			$resultat = $this->db->get($query);
			return $resultat;
		}

		// Fonction permettant de se connecter 
		public function connectAdmin ($mail,$mdp) {

			// Préparation des requêtes 
			$queryMail = 'SELECT COUNT(*) FROM administrateurs WHERE mail = "'.$mail.'";';
			$queryMdp = 'SELECT COUNT(*) FROM administrateurs WHERE mdp = "'.$mdp.'";';

			// Exécution des requêtes
			$resultatMail = $this->db->get($queryMail);
			$resultatMdp = $this->db->get($queryMdp);

			// Vérification de la concordance des résultats obtenus précédemment
			// On regarde si le pseudo et le mdp rentrés sont dans la base
			if ($resultatMail[0] == 1 && $resultatMdp[0] == 1) {

				// Récupération de 'id_admin'
				$idAdmin = $this->getIdAdmin($mail);

				// Récupération des infos de l'utilisateur/client
				$queryConnect = 'SELECT * FROM administrateurs WHERE id_admin = '.$idAdmin[0].';';
				$adminConnected = $this->db->get($queryConnect);
				return $adminConnected;
			}
			else {
				echo '<h2>Le mail et/ou le mot de passe n\'est/ne sont pas correct(s)';
			}
		}

		// Liste des utilisateurs
		public function listUtilisateurs() {

			$query = 'SELECT cl.id_client, cl.nom, cl.prenom, cl.ville, cl.adresse, cl.cp, cl.mail, cl.dateArrivee, ut.id_utilisateur, ut.pseudo
						FROM clients cl, utilisateurs ut
						WHERE cl.id_utilisateur = ut.id_utilisateur;';
			$resultat = $this->db->getAll($query);
			return $resultat;
		}

		// Liste des produits
		public function listArticles() {
			$query = 'SELECT * FROM articles;';
			$resultat = $this->db->getAll($query);
			return $resultat;
		}

		// Détails d'un produit
		public function viewArticle($idArt) {
			$query = 'SELECT * FROM articles WHERE id_article = '.$idArt.';';
			$resultat = $this->db->get($query);
			return $resultat;
		}

		// Ajouter une planète
		public function addArticle1($nom, $description, $diametre, $gravity, $temperature, $lunes, $prix, $quantite, $urlImage, $idDesc) {
			$query = 'INSERT INTO articles (nom,description,diametre,gravity,temperature,lunes,prix,quantite,urlImage,id_desc)
						VALUES (:nom,:description,:diametre,:gravity,:temperature,:lunes,:prix,:quantite,:urlImage,:id_desc)';
			$tab = array (
				'nom' => $nom,
				'description' => $description,
				'diametre' => $diametre,
				'gravity' => $gravity,
				'temperature' => $temperature,
				'lunes' => $lunes,
				'prix' => $prix,
				'quantite' => $quantite,
				'urlImage' => $urlImage,
				'id_desc' => $idDesc
				);
			$resultat = $this->db->insert($query,$tab);
			return $resultat;
		}

		// Ajouter une étoile
		public function addArticle2($nom, $description, $diametre, $gravity, $temperature, $prix, $quantite, $urlImage, $idDesc) {
			$query = 'INSERT INTO articles (nom,description,diametre,gravity,temperature,prix,quantite,urlImage,id_desc)
						VALUES (:nom,:description,:diametre,:gravity,:temperature,:prix,:quantite,:urlImage,:id_desc)';
			$tab = array (
				'nom' => $nom,
				'description' => $description,
				'diametre' => $diametre,
				'gravity' => $gravity,
				'temperature' => $temperature,
				'prix' => $prix,
				'quantite' => $quantite,
				'urlImage' => $urlImage,
				'id_desc' => $idDesc
				);
			$resultat = $this->db->insert($query,$tab);
			return $resultat;
		}

		// Ajouter un objet stellaire massif
		public function addArticle3($nom, $description, $diametre, $gravity, $temperature, $prix, $quantite, $urlImage, $idDesc) {
			$query = 'INSERT INTO articles (nom,description,diametre,gravity,temperature,prix,quantite,urlImage,id_desc)
						VALUES (:nom,:description,:diametre,:gravity,:temperature,:prix,:quantite,:urlImage,:id_desc)';
			$tab = array (
				'nom' => $nom,
				'description' => $description,
				'diametre' => $diametre,
				'gravity' => $gravity,
				'temperature' => $temperature,
				'prix' => $prix,
				'quantite' => $quantite,
				'urlImage' => $urlImage,
				'id_desc' => $idDesc
				);
			$resultat = $this->db->insert($query,$tab);
			return $resultat;
		}

		// Ajouter un accessoire
		public function addArticle4($nom, $description, $prix, $quantite, $urlImage, $idDesc) {
			$query = 'INSERT INTO articles (nom,description,prix,quantite,urlImage,id_desc)
						VALUES (:nom,:description,:prix,:quantite,:urlImage,:id_desc)';
			$tab = array (
				'nom' => $nom,
				'description' => $description,
				'prix' => $prix,
				'quantite' => $quantite,
				'urlImage' => $urlImage,
				'id_desc' => $idDesc
				);
			$resultat = $this->db->insert($query,$tab);
			return $resultat;
		}

		// Détails d'un utilisateur spécifique
		public function viewUtilisateur($idClient) {
			$query = 'SELECT cl.id_client, cl.nom, cl.prenom, cl.ville, cl.adresse, cl.cp, cl.mail, cl.dateArrivee, ut.id_utilisateur, ut.pseudo
						FROM clients cl, utilisateurs ut
						WHERE cl.id_utilisateur = ut.id_utilisateur
						AND cl.id_client = '.$idClient.';';
			$resultat = $this->db->get($query);
			return $resultat;
		}

		// Vérification cohérence mail/mdp
		public function checkMdpAdmin($mail,$mdp) {
			$query = 'SELECT COUNT(*) FROM administrateurs 
						WHERE mail = "'.$mail.'"
						AND mdp = "'.$mdp.'";';
			$resultat = $this->db->get($query);
			return $resultat;
		}

		// Suppression d'un client/utilisateur
		public function deleteClient($idClient, $idUtilisateur) {

			// Préparation des requêtes pour supprimer Client/Utilisateur
			$queryClient = 'DELETE FROM clients WHERE id_client = '.$idClient.';';
			$queryUtilisateur = 'DELETE FROM utilisateurs WHERE id_utilisateur = '.$idUtilisateur.';';

			// Exécution des requêtes
			$resultatCl = $this->db->get($queryClient);
			$resultatUt = $this->db->get($queryUtilisateur);
		}

		// Supprime un article spécifique
		public function deleteArticle($idArt) {

			$query = 'DELETE FROM articles WHERE id_article = '.$idArt.';';
			$resultat = $this->db->get($query);
			return $resultat;
		}

		// Retourne l'ID_Client
		public function getIdClient ($mail) {
			$query = 'SELECT id_client FROM clients WHERE mail = "'.$mail.'";';
			$idClient = $this->db->get($query);
			return $idClient;
		}

		// Retourne l'ID_Utilisateur
		public function getIdUtilisateur ($pseudo) {
			$query = 'SELECT id_utilisateur FROM utilisateurs WHERE pseudo = "'.$pseudo.'";';
			$idUtilisateur = $this->db->get($query);
			return $idUtilisateur;
		}

		// Modifie un article
		public function updateArticle($nom,$description,$diametre,$gravity,$temperature,$lunes,$prix,$quantite,$urlImage,$idArt) {
			$query = 'UPDATE articles 
			SET nom = "'.$nom.'"
			AND description = "'.$description.'"
			AND diametre = '.$diametre.'
			AND gravity = '.$gravity.'
			AND temperature = '.$temperature.'
			AND lunes = '.$lunes.'
			AND prix = '.$prix.'
			AND quantite = '.$quantite.'
			AND urlImage = '.$urlImage.'
			WHERE id_article = '.$idArt.';';
			$resultat = $this->db->get($query);
			return $resultat;
		}


	}

?>