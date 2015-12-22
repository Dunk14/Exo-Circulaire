<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/models/article.php');
	class Controller_Article {
		// Fonction permettant de lister les articles
		public function listArticle() {

			$articles = new Model_Article();
			$listeArticles = $articles->listArticles();
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/articles/list.php');
		}

		public function viewArticle($id) {

			$articles = new Model_Article();
			$articleDetails = $articles->loadArticle($id);
			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/articles/view.php');
		}
	}

?>