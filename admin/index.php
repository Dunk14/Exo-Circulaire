<?php 
	$controller = "";
	$action = "";

	if (!empty($_GET['c']) && !empty($_GET['a'])) {
		$controller = $_GET['c'];
		$action = $_GET['a'];
	}

	if ($controller == "article" && $action == "add") {
		require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/article.php');
	}

?>