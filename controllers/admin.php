<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/models/admin.php');
	class Controller_Admin {

		// Fonction permettant de déconnecter l'administrateur présentemment connecté 
		public function disconnectAdmin() {
			session_destroy();
			header("Location: /exo-circulaire/index.php");
			die();
		}

		public function listUtilisateurs() {
			
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/models/admin.php');
			// Réception de la liste des utilisateurs
			$admin = new Model_Admin();
			$listUtilisateurs = $admin->listUtilisateurs();
			// Affichage
			if (!empty($listUtilisateurs)) {
				require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/admin/utilisateurs.php');
			}
			else {
				echo 'Il n\'y a aucun utilisateur d\'inscrit sur le site, vous devriez déposer le bilan';
			}

		}

		public function confirmDeleteClient($idClient) {

			// Réception de la liste des utilisateurs
			$admin = new Model_Admin();
			$viewClient = $admin->viewUtilisateur($idClient);
			// Affichage
			if (!empty($viewClient)) {
				require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/admin/confirmdeleteclient.php');
				// Si un mot de passe est rentré
				if (!empty($_POST)) {

					// Récupération du mot de passe Admnistrateur
					$mdpAdmin = htmlspecialchars($_POST['passwordAdmin']);

					// Vérification de la cohérence mail/mdp
					$checkMdp = $admin->checkMdpAdmin($_SESSION['mailAdmin'],$mdpAdmin);

					// Si cohérence entre mail et mdp Admin
					if ($checkMdp > 0) {

						// On efface client/utilisateur
						$deleteClient = $admin->deleteClient($viewClient['id_client'],$viewClient['id_utilisateur']);
						header("Location: index.php?c=utilisateur&a=list");
						die();
					}
				}
				else {
					echo "<h2>Veuillez entrer votre mot de passe</h2>";
				}
			}
			else {
				echo 'Il n\'y a aucun utilisateur d\'inscrit sur le site, vous devriez déposer le bilan';
			}

		}

		public function addArticle($idDesc) {
			if (!empty($idDesc)) {
				require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/admin/addarticle.php');

				// Si les champs ont étés remplis et validés
				if (!empty($_POST)) {
					// Planète
					if ($idDesc == 1) {
						$nom = htmlspecialchars($_POST['nom']);
						$description = htmlspecialchars($_POST['description']);
						$diametre = htmlspecialchars($_POST['diametre']);
						$gravity = htmlspecialchars($_POST['gravity']);
						$temperature = htmlspecialchars($_POST['temperature']);
						$lunes = htmlspecialchars($_POST['lunes']);
						$prix = htmlspecialchars($_POST['prix']);
						$quantite = htmlspecialchars($_POST['quantite']);
						$urlImage = htmlspecialchars($_POST['urlImage']);

						$admin = new Model_Admin();
						$addArticle = $admin->addArticle1($nom, $description, $diametre, $gravity, $temperature, $lunes, $prix, $quantite, $urlImage, $idDesc);
						if ($addArticle) {
							header("Location: index.php?c=article&a=list");
							die();
						}
					}
					// Étoile
					else if ($idDesc == 2) {
						$nom = htmlspecialchars($_POST['nom']);
						$description = htmlspecialchars($_POST['description']);
						$diametre = htmlspecialchars($_POST['diametre']);
						$gravity = htmlspecialchars($_POST['gravity']);
						$temperature = htmlspecialchars($_POST['temperature']);
						$prix = htmlspecialchars($_POST['prix']);
						$quantite = htmlspecialchars($_POST['quantite']);
						$urlImage = htmlspecialchars($_POST['urlImage']);

						$admin = new Model_Admin();
						$addArticle = $admin->addArticle2($nom, $description, $diametre, $gravity, $temperature, $prix, $quantite, $urlImage, $idDesc);
						if ($addArticle) {
							header("Location: index.php?c=article&a=list");
							die();
						}
					}
					// Objet Stellaire Massif
					else if ($idDesc == 3) {
						$nom = htmlspecialchars($_POST['nom']);
						$description = htmlspecialchars($_POST['description']);
						$diametre = htmlspecialchars($_POST['diametre']);
						$gravity = htmlspecialchars($_POST['gravity']);
						$temperature = htmlspecialchars($_POST['temperature']);
						$prix = htmlspecialchars($_POST['prix']);
						$quantite = htmlspecialchars($_POST['quantite']);
						$urlImage = htmlspecialchars($_POST['urlImage']);

						$admin = new Model_Admin();
						$addArticle = $admin->addArticle3($nom, $description, $diametre, $gravity, $temperature, $prix, $quantite, $urlImage, $idDesc);
						if ($addArticle) {
							header("Location: index.php?c=article&a=list");
							die();
						}
					}
					// Accessoire
					else if ($idDesc == 4) {
						$nom = htmlspecialchars($_POST['nom']);
						$description = htmlspecialchars($_POST['description']);
						$prix = htmlspecialchars($_POST['prix']);
						$quantite = htmlspecialchars($_POST['quantite']);
						$urlImage = htmlspecialchars($_POST['urlImage']);

						$admin = new Model_Admin();
						$addArticle = $admin->addArticle4($nom, $description, $prix, $quantite, $urlImage, $idDesc);
						if ($addArticle) {
							header("Location: index.php?c=article&a=list");
							die();
						}
					}
				}
			} else {
				header("Location: exo-circulaire/views/admin/articles.php");
				die();
			}
		}

		public function listArticles() {

			// Réception de la liste des produits
			$admin = new Model_Admin();
			$listArticles = $admin->listArticles();
			// Affichage
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/admin/articles.php');


		}

		public function updateArticle($idArt) {

			// Réception du produit
			$admin = new Model_Admin();
			$article = $admin->viewArticle($idArt);
			// Affichage
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/admin/updatearticle.php');
			
			if (!empty($_POST)) {
				$nom = htmlspecialchars($_POST['nom']);
				$description = htmlspecialchars($_POST['description']);
				$diametre = htmlspecialchars($_POST['diametre']);
				$gravity = htmlspecialchars($_POST['gravity']);
				$temperature = htmlspecialchars($_POST['temperature']);
				$lunes = htmlspecialchars($_POST['lunes']);
				$prix = htmlspecialchars($_POST['prix']);
				$quantite = htmlspecialchars($_POST['quantite']);
				$urlImage = htmlspecialchars($_POST['urlImage']);

				$admin = new Model_Admin();
				$updateArticle = $admin->updateArticle($nom,$description,$diametre,$gravity,$temperature,$lunes,$prix,$quantite,$urlImage,$idArt);
				header("Location: index.php?c=article&a=list");
				die();
			}
		}

		public function deleteArticle($idArt) {

			// Suppression du produit
			$admin = new Model_Admin();
			$deleteArticle = $admin->deleteArticle($idArt);
			// Redirection
		 	header("Location: exo-circulaire/views/admin/articles.php");
		 	die();
		}

	}

?>