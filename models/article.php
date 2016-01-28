<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/library/db.php');
	class Model_Article {

		private $db;

		public function __construct() {
			$this->db = DB::getInstance();
		}

		// Liste de tous les articles
		public function listArticles() {
			$query = "SELECT * FROM articles";
			$resultat = $this->db->getAll($query);
			return $resultat;
		}

		// Charger un article spécifique
		public function loadArticle($id) {
			$query = "SELECT * FROM articles WHERE id_article = ".$id;
			$resultat = $this->db->get($query);
			return $resultat;
		}

		// Liste toutes les catégories
		public function categories() {
			$query = 'SELECT * FROM categories;';
			$resultat = $this->db->getAll($query);
			return $resultat;
		}

		public function prix() {
			$query = 'SELECT MIN(prix), MAX(prix) FROM articles;';
			$resultat = $this->db->get($query);
			return $resultat;
		}

		public function prixCategorie($id_desc) {
			$query = 'SELECT MIN(prix), MAX(prix) FROM articles, categories 
			WHERE articles.id_desc = categories.id_desc 
			AND categories.id_desc = '.$id_desc.';';
			$resultat = $this->db->get($query);
			return $resultat;
		}

	}

?>