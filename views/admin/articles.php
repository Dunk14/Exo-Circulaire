<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/headadmin.php');
?>

	<link rel="stylesheet" href="../assets\css\background\inaccessible.css">
	<link rel="stylesheet" href="../assets/css/admin/articles.css">
	<title>
		Panel Admin
	</title>
</head>

<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/headeradmin.php');
?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h2 class="myButtonMini">Ajouter un article</h2>
				<a href="index.php?c=article&a=addArticle&id_desc=1" class="myButtonMini">+ Planète</a>
				<a href="index.php?c=article&a=addArticle&id_desc=2" class="myButtonMini">+ Étoile</a>
				<a href="index.php?c=article&a=addArticle&id_desc=3" class="myButtonMini">+ Objet Stellaire Massif</a>
				<a href="index.php?c=article&a=addArticle&id_desc=4" class="myButtonMini">+ Accessoire</a>
			</div>
		</div>
		<h1>Liste des articles</h1>
	</div>
	<div class="container">
		<div class="row">
			<?php 

			// Si il y a au moins un article
			if (!empty($listArticles)) {
				foreach ($listArticles as $article) { 
						?>
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div id="article">
								<div class="col-xs-12 col-sm-12 col-md-4">
									<div id="image"> 
										<?php echo "<img width='100' height='100' src=".$article['urlImage'].">"; ?>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-8">
									<h2><?php echo $article['nom']; ?></h2>
									<ul>
										<li><strong>Diamètre:</strong> <?php echo $article['diametre']; ?> km</li>
										<li><strong>Gravité:</strong> <?php echo $article['gravity']; ?> m/s²</li>
										<li><strong>Température:</strong> <?php echo $article['temperature']; ?> C°</li>
										<li><strong>Lunes:</strong> <?php echo $article['lunes']; ?></li>
										<li><strong>Quantité:</strong> <?php echo $article['quantite']; ?></li>
										<li><a href="index.php?c=admin&a=updateArticle&id_art=<?php echo $article['id_article'];?>"><img src="../assets/img/icons/update.png" width="32" height="32" class="update"></a> | 
										<a href="index.php?c=admin&a=deleteArticle&id_art=<?php echo $article['id_article']; ?>"><img src="../assets/img/icons/delete.png" width="32" height="32" class="delete"></a></li>
									</ul>
								</div>
							</div>
						</div>
						<?php
				}
			}
			else {
				echo '<h1 style="margin-top:100px;">Il n\'y a aucun article pour l\'instant</h1>';
			}
			

			?>
		</div>
	</div>

</body>
</html>