<?php 

	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/models/commande.php');

	class Controller_Commande {

		public function listCommandes ($idUtilisateur) {
			$commande = new Model_Commande();
			$listCommandes = $commande->listCommandes($idUtilisateur);
			return $listCommandes;
		}

	}

?>