<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/library/db.php');
	class Model_Article {

		private $db;

		public function __construct() {
			$this->db = DB::getInstance();
		}

		public function listArticles() {
			$query = "SELECT * FROM articles";
			$resultat = $this->db->getAll($query);
			return $resultat;
		}

		public function loadArticle($id) {
			$query = "SELECT * FROM articles WHERE id_article = ".$id;
			$resultat = $this->db->get($query);
			return $resultat;
		}

	}

?>