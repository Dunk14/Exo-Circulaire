<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/head.php');
?>
	<link rel="stylesheet" href="assets\css\background\doublering.css">
	<link rel="stylesheet" href="assets\css\form\form.css">
	<title>
		Se connecter Admin-Exo-Circulaire
	</title>
</head>
<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/header.php');
?>
	<main class="container">
      	<div class="row">
      		<h1 class="titre">Vous souhaitez vous connecter en administrateur</h1>
	        <div class="col-xs-12 col-sm-12 col-md-12">
				<form method="post" action="">
					<table cellspacing="8" class="client">
						<tr>
							<td><label for="mail">Mail: </label></td>
							<td><input type="text" name="mail" id="mail" maxlength="25" size="25" autofocus="autofocus"
							required="required"></td>
						</tr>
						<tr>
							<td><label for="mdp">Mot de passe: </label></td>
							<td><input type="password" name="mdp" id="mdp" size="25" maxlength="255" required="required"></td>
						</tr>
					</table>
					<table cellspacing="8" class="utilisateur">
						<tr>
							<td><input type="submit" value="Se connecter" class="myButtonLarge"></td>
							<td><input type="reset" value="Réinitialiser" class="myButtonLarge"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</main>

</body>
</html>