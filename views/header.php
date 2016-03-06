<body>

	<header class="header">
		<div class="container">
        	<div class="row">
         		<div class="col-xs-12 col-sm-12 col-md-12">
         			<a class="header__menu" href="index.php">Accueil</a>
					<a class="header__menu" href="index.php?c=article&a=list">Produits</a>
					<?php
						if (!empty($_SESSION['idUtilisateur'])) {
							echo '<a class="header__menu" href="index.php?c=utilisateur&a=account">Compte</a>';
							echo '<a class="header__menu" href="index.php?c=utilisateur&a=disconnect">Deconnexion</a>';
						}
						else {
							echo '<a class="header__menu" href="index.php?c=utilisateur&a=insert">S\'enregistrer</a>';
							echo '<a class="header__menu" href="index.php?c=utilisateur&a=connect">Se connecter</a>';
						}
					?>					
					<a class="header__menu" href="Contact.php">Contact</a>
				</div>	
			</div>
		</div>
	</header>

