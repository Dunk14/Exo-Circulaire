<?php 
	$controller = "";
	$action = "";

	if (!empty($_GET['c']) && !empty($_GET['a'])) {
		$controller = $_GET['c'];
		$action = $_GET['a'];
	}

	if ($controller == "article" && $action == "list") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/article.php');
		$controller_article = new controller_article();
		$controller_article->listArticle();
	} 
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
	elseif ($controller == "utilisateur" && $action == "insert") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
		$controller_utilisateur = new controller_utilisateur();
		$controller_utilisateur->addUtilisateur();
	}
	elseif ($controller == "utilisateur" && $action == "connect") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/utilisateur.php');
		$controller_utilisateur = new controller_utilisateur();
		$controller_utilisateur->connectUtilisateur();
	}
	elseif ($controller == "" && $action == "") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/accueil/frontdesk.php');
	}
?>