<h1>Coucou, je suis la vue listing produit</h1>
<?php 

	foreach ($listeArticles as $article) {
		echo '<h2>'.$article['nom'].'</h2>';
		echo '<p>Gravit&eacute;: '.$article['gravity'].'</p>';
		echo '<p>Nombre de lunes: '.$article['lunes'].'</p>';
	}
