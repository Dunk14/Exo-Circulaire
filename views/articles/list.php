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
							if ($article['quantite'] > 0) {
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
												<li>Gravité: <?php echo $article['gravity']; ?> m/s²</li>
												<li>Température: <?php echo $article['temperature']; ?> C°</li>
												<li>Lunes: <?php echo $article['lunes']; ?></li>
												<li>Quantité: <?php echo $article['quantite']; ?></li>
												<li><strong><?php echo number_format($article['prix'], 2, ',', ' '); ?> €</strong></li>
											</ul>
											<a href="index.php?c=utilisateur&a=addpanier&id_article=<?php echo $article['id_article']; ?>&nom_article=<?php echo $article['nom']; ?>&id_desc=<?php echo $article['id_desc']; ?>&prix=<?php echo $article['prix']; ?>"><div class="addshop">Ajouter au panier</div></a>
										</div>
									</div>
								</div>
								<?php
							} else {
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
												<li>Gravité: <?php echo $article['gravity']; ?> m/s²</li>
												<li>Température: <?php echo $article['temperature']; ?> C°</li>
												<li>Lunes: <?php echo $article['lunes']; ?></li>
												<li>Quantité: <?php echo $article['quantite']; ?></li>
												<li><strong><?php echo number_format($article['prix'], 2, ',', ' '); ?> €</strong></li>
											</ul>
										</div>
									</div>
								</div>
								<?php
							}
						}
					}
					else {
						echo '<h1 style="margin-top:100px;">Il n\'y a aucun article pour l\'instant</h1>';
					}
					?>
	        	</div>
	        </main>

	        <aside class="aside col-xs-12 col-sm-12 col-md-4">
				<div class="row">

					<div class="col-xs-12 col-sm-6 col-md-12">

	  					<div class="shoppingbasket">
	  						<h3>Panier</h3>
	  							<div class="product__user">
	  								<?php
	  								
	  								// Il y a quelque chose dans le panier
	  								if (!empty($_SESSION['panier'])) {
	  									$total = 0;
	  									// De 0 à la taille du panier-1
	  									for ($i=0; $i < $_SESSION['sizePanier']; $i++) {
	  										// Change la couleur du bg à chaque fois 
	  										if ($i % 2 == 0) {
	  											$bg = "#f7f7f7";
	  										}
	  										else {
	  											$bg = "#d7d7d7";
	  										}
	  										?>
	  										<p style="background-color:<?php echo $bg; ?>;"><strong> - </strong><?php echo $_SESSION['panier'][$i]['nom']; ?>
	  										<a class="delete" href="index.php?c=utilisateur&a=pullpanier&id_article=<?php echo $_SESSION['panier'][$i]['id_article']; ?>">
	  										<img src="assets/img/icons/delete.png" width="24" height="24">
	  										</a>
	  										</p>
	  										<?php
	  										// Calcul du prix total (tjr dans la boucle)
	  										$total+=$_SESSION['panier'][$i]['prix'];
	  									}
	  									$_SESSION['panier']['total'] = $total;
	  									?>
	  									<p><strong><?php echo number_format($total, 2, ',', ' '); ?> €</strong></p>
	  									<a href="index.php?c=utilisateur&a=confirmpanier"><div class="purchase">Commander</div></a>
	  									<?php
	  								}
	  								else {
	  									?>
	  									<p>Il n'y a rien dans le panier</p>
	  									<?php
	  								}
	  								?>
	  							</div>
	  					</div>

		  			</div>

		  			<div class="col-xs-12 col-sm-6 col-md-12">



		  			</div>
		  		</div>
	  		</aside>

	    </div>
	</div>