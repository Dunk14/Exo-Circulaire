<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/library/db.php');
	class Model_Commande {

		private $db;

		public function __construct() {
			$this->db = DB::getInstance();
		}

		public function listCommandes ($idUtilisateur) {
			$queryCount = 'SELECT COUNT(*) FROM commandes WHERE id_utilisateur = '.$idUtilisateur.';';
			$resultatCount = $this->db->get($queryCount);

			// Si existence de commande(s) pour cet utilisateur
			if ($resultatCount[0] >= 1) {
				$queryCommandes = 'SELECT * FROM commandes WHERE id_utilisateur = '.$idUtilisateur.' ORDER BY date_commande DESC;';
				$resultatCommandes = $this->db->getAll($queryCommandes);
				return $resultatCommandes;
			}
			else {
				return $resultatCount[0];
			}
		}

	}

?>