<?php 
	session_start();
	$controller = "";
	$action = "";

	if (!empty($_GET['c']) && !empty($_GET['a'])) {
		$controller = $_GET['c'];
		$action = $_GET['a'];
	}

	// Liste des articles en vente
	if ($controller == "article" && $action == "list") {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/article.php');
			$controller_article = new controller_article();
			$controller_article->listArticles();
	}

	// Ajout d'un article au panier
	elseif ($controller == "utilisateur" && $action == "addpanier") {
		if (empty($_GET['id_article']) || empty($_GET['nom_article']) || empty($_GET['id_desc']) || empty($_GET['prix'])) {
			header("Location: index.php?c=article&a=list");
			die();
		} else {
			$idArt = intval($_GET['id_article']);
			$nomArticle = $_GET['nom_article'];
			$idDesc = intval($_GET['id_desc']);
			$prix = intval($_GET['prix']);
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
			$controller_utilisateur = new controller_utilisateur();
			$controller_utilisateur->addPanier($idArt,$nomArticle,$idDesc,$prix);
		}
	} 

	// Suppresion d'un article au panier
	elseif ($controller == "utilisateur" && $action == "pullpanier") {
		if (empty($_GET['id_article'])) {
			header("Location: index.php?c=article&a=list");
			die();
		} else {
			$idArt = intval($_GET['id_article']);
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
			$controller_utilisateur = new controller_utilisateur();
			$controller_utilisateur->pullPanier($idArt);
		}
	} 

	// Confirmation du panier
	elseif ($controller == "utilisateur" && $action == "confirmpanier") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
		$controller_utilisateur = new controller_utilisateur();
		$controller_utilisateur->confirmPanier();
	} 

	// Finalisation de l'achat
	elseif ($controller == "utilisateur" && $action == "finalizepanier") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
		$controller_utilisateur = new controller_utilisateur();
		$controller_utilisateur->finalizePanier();
	} 

	// Achat du panier
	elseif ($controller == "utilisateur" && $action == "purchase") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
		$controller_utilisateur = new controller_utilisateur();
		$controller_utilisateur->purchase();
	} 


	// Connexion/Inscription pour achat
	elseif ($controller == "utilisateur" && $action == "finalizeconnexion") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
		$controller_utilisateur = new controller_utilisateur();
		$controller_utilisateur->finalizeConnexion();
	} 

	// Vue d'un article en détails
	elseif ($controller == "article" && $action == "view") {
		if (empty($_GET['id'])) {
			echo "<p>Il manque l'identifiant du produit</p>";
		} else {
			$idProduit = intval($_GET['id']);
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/article.php');
			$controller_article = new controller_article();
			$controller_article->viewArticle($idProduit);
		}
	} 
	// Enregistrement client
	elseif ($controller == "utilisateur" && $action == "insert") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
		$controller_utilisateur = new controller_utilisateur();
		$controller_utilisateur->addUtilisateur();
	}
	// Connexion client
	elseif ($controller == "utilisateur" && $action == "connect") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
		$controller_utilisateur = new controller_utilisateur();
		$controller_utilisateur->connectUtilisateur();
	}
	// Connexion administrateur
	elseif ($controller == "utilisateur" && $action == "connectadmin") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
		$controller_utilisateur = new controller_utilisateur();
		$controller_utilisateur->connectAdmin();
	}
	// Déconnexion client
	elseif ($controller == "utilisateur" && $action == "disconnect") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
		$controller_utilisateur = new controller_utilisateur();
		$controller_utilisateur->disconnectUtilisateur();
	}
	// Infos et Commandes du client
	elseif ($controller == "utilisateur" && $action == "account") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
		$controller_utilisateur = new controller_utilisateur();
		$controller_utilisateur->accountUtilisateur();
	}
	// Modification des infos client
	elseif ($controller == "utilisateur" && $action == "update") {
		if ($_SESSION['idUtilisateur'] == $_GET['id_utilisateur']) {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
			$controller_utilisateur = new controller_utilisateur();
			$controller_utilisateur->updateUtilisateur($_GET['id_utilisateur']);
		}
		else {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/errors/inaccessible.php');
		}
		
	}
	// Modification du mot de passe client
	elseif ($controller == "utilisateur" && $action == "updatemdp") {
		if ($_SESSION['idUtilisateur'] == $_GET['id_utilisateur']) {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
			$controller_utilisateur = new controller_utilisateur();
			$controller_utilisateur->updateMdpUtilisateur($_GET['id_utilisateur']);
		}
		else {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/errors/inaccessible.php');
		}
		
	}
	// Vue d'une Commande en détails
	elseif ($controller == "utilisateur" && $action == "vieworder") {
		if ($_SESSION['idUtilisateur'] == $_GET['id_utilisateur']) {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
			$controller_utilisateur = new controller_utilisateur();
			$controller_utilisateur->viewOrder($_GET['id_utilisateur'],$_GET['id_commande']);
		}
		else {
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/errors/inaccessible.php');
		}
		
	}
	// Page d'accueil
	elseif ($controller == "" && $action == "") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/accueil/frontdesk.php');
	}
?>