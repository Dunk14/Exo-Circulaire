<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/head.php');
?>
	<link rel="stylesheet" href="assets\css\background\doublering.css">
	<link rel="stylesheet" href="assets\css\article\confirmpanier.css">
	<title>
		Confirmation du panier
	</title>
</head>
<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/header.php');
?>
	<div class="container">
      	<div class="row">
      		<h1 class="titre">Votre panier</h1>
      		<main class="col-xs-12 col-sm-12 col-md-8">

	        	<div class="row">

		        <?php
		        	for ($i=0; $i < $_SESSION['sizePanier']; $i++) { 
	        			?>
	        			<div class="col-xs-12 col-sm-6 col-md-6">
							<div id="article">
								<ul>
									<li><strong><?php echo $_SESSION['panier'][$i]['nom']; ?></strong></li>
									<li><strong><?php echo number_format($_SESSION['panier'][$i]['prix'], 2, ',', ' '); ?> €</strong></li>
								</ul>
							</div>
						</div>
	        			<?php
		        	}
	       		?>

	       		</div>

	       	</main>

	       	<aside class="col-xs-12 col-sm-12 col-md-4">
	       		<div class="shoppingbasket">
	       			<h1>Voulez-vous continuer</h1>
	       			<h2><?php echo number_format($_SESSION['panier']['total'], 2, ',', ' '); ?> €</h2>
	       			<a href="index.php?c=utilisateur&a=finalizepanier">
	       			<div class="finalize">Oui</div>
	       			</a>
	       			<a href="index.php?c=article&a=list">
	       			<div class="finalize__none">Non</div>
	       			</a>
	       		</div>
	       	</aside>

	    </div>
	</div>
	        	