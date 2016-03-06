<?php
	session_start();
	$controller = "";
	$action = "";

	// Connexion d'un Admin requise pour accéder à cette page
	if (!empty($_SESSION['idAdmin'])) {
		if (!empty($_GET['c']) && !empty($_GET['a'])) {
			$controller = $_GET['c'];
			$action = $_GET['a'];
		}

		// Liste des clients
		if ($controller == "utilisateur" && $action == "list") {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/admin.php');
			$controller_admin = new Controller_Admin();
			$controller_admin->listUtilisateurs();
		}

		// Confirmation par mot de passe et clic de la suppresion d'un client
		elseif ($controller == "admin" && $action == "confirmDeleteClient") {
			if (empty($_GET['id_client'])) {
				header("Location: exo-circulaire/admin/index.php?c=utilisateur&a=list");
				die();
			} else {
				$idClient = intval($_GET['id_client']);
				require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/admin.php');
				$controller_admin = new controller_admin();
				$controller_admin->confirmDeleteClient($idClient);
			}
		}

		// Liste des articles
		elseif ($controller == "article" && $action == "list") {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/admin.php');
			$controller_admin = new Controller_Admin();
			$controller_admin->listArticles();
		}

		// Confirmation par mot de passe et clic de la suppresion d'un client
		elseif ($controller == "article" && $action == "addArticle") {
			if (empty($_GET['id_desc'])) {
				header("Location: exo-circulaire/admin/index.php?c=article&a=list");
				die();
			} else {
				$idDesc = intval($_GET['id_desc']);
				require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/admin.php');
				$controller_admin = new controller_admin();
				$controller_admin->addArticle($idDesc);
			}
		}

		// Mise à jour des détails d'un article
		elseif ($controller == "admin" && $action == "updateArticle") {
			if (empty($_GET['id_art'])) {
				header("Location: exo-circulaire/admin/index.php?c=article&a=list");
				die();
			} else {
				$idArt = intval($_GET['id_art']);
				require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/admin.php');
				$controller_admin = new controller_admin();
				$controller_admin->updateArticle($idArt);
			}
		}

		// Suppression d'un article
		elseif ($controller == "admin" && $action == "deleteArticle") {
			if (empty($_GET['id_art'])) {
				header("Location: exo-circulaire/admin/index.php?c=article&a=list");
				die();
			} else {
				$idArt = intval($_GET['id_art']);
				require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/admin.php');
				$controller_admin = new controller_admin();
				$controller_admin->deleteArticle($idArt);
			}
		}

		// Déconnexion de l'administrateur
		elseif ($controller == "admin" && $action == "disconnect") {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/admin.php');
			$controller_admin = new Controller_Admin();
			$controller_admin->disconnectAdmin();
		}

		// Accueil Administrateur
		elseif ($controller == "" && $action == "") {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/admin/panel.php');
		}
	}
	else {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/admin/connect.php');
		echo '<h2>Si vous n\'êtes pas admin, il vous serait plus judicieux de vous rendre 
		à la page de connexion précédente, celle pour client.</h2>';
	}
	

?>