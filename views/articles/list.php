<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/head.php');
?>

	<link rel="stylesheet" href="assets\css\background\doublering.css">
	<link rel="stylesheet" href="assets/css/utilities/shoppingbasket.css">
	<link rel="stylesheet" href="assets/css/article/list.css">
	<title>
		Les produits
	</title>
</head>

<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/header.php');
?>	

	<div class="container">
      	<div class="row">
	        <main class="col-xs-12 col-sm-12 col-md-8">

	        	<div class="row">
        			<?php 
					// Si il y a au moins un article
					if (!empty($listArticles)) {
						foreach ($listArticles as $article) { 
					?>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div id="article">
							<div class="col-xs-12 col-sm-12 col-md-2">
								<div id="image"> 
									<?php echo "<img width='100' height='100' src=".$article['urlImage'].">"; ?>
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-10">
								<h2><?php echo $article['nom']; ?></h2>
								<ul>
									<li>Diamètre: <?php echo $article['diametre']; ?></li>
									<li>Gravité: <?php echo $article['gravity']; ?></li>
									<li>Température: <?php echo $article['temperature']; ?> C°</li>
									<li>Lunes: <?php echo $article['lunes']; ?></li>
									<li>Quantité: <?php echo $article['quantite']; ?></li>
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
	        </main>
	    </div>
	</div>