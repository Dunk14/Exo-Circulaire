<body>

	<header class="header">
		<div class="container-fluid">
        	<div class="row">
         		<div class="col-xs-12 col-sm-12 col-md-12">
         			<a class="header__menu" href="index.php">Accueil</a>
					<a class="header__menu" href="index.php?c=article&a=view">Acheter</a>
					<a class="header__menu" href="index.php?c=utilisateur&a=insert">S'enregistrer</a>
					<a class="header__menu" href="index.php?c=utilisateur&a=connect">Se connecter</a>
					<a class="header__menu" href="Contact.php">Contact</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<?php

						if (!empty($_SESSION)) {
							echo '<h1>Satellite: '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</h1>';
						}

					?>
				</div>
			</div>
		</div>
	</header>

