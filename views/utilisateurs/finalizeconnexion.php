<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/head.php');
?>
	<link rel="stylesheet" href="assets\css\background\doublering.css">
	<link rel="stylesheet" href="assets\css\form\form.css">
	<link rel="stylesheet" href="assets\css\article\finalizepanier.css">
	<title>
		S'enregistrer-Exo-Circulaire
	</title>
</head>
<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/header.php');
?>
	<main class="container">
      	<div class="row">
      		<h1 class="titre">Vous souhaitez acheter</h1>
	        <div class="col-xs-12 col-sm-12 col-md-6">
	        	<h2 class="subtitle">Vous n'etes pas membre</h2> 
				<form method="post" action="">
					<table cellspacing="8" class="client">
						<tr>
							<td><label for="nom">Nom: </label></td>
							<td><input type="text" name="nom" id="nom" maxlength="25" size="25" autofocus="autofocus"
							required="required"></td>
						</tr>
						<tr>
							<td><label for="prenom">Prenom: </label></td>
							<td><input type="text" name="prenom" id="prenom" size="25" maxlength="25" required="required"></td>
						</tr>
						<tr>
							<td><label for="ville">Ville: </label></td>
							<td><input type="text" name="ville" id="ville" size="25" maxlength="40" required="required"></td>
						</tr>
						<tr>
							<td><label for="adresse">Adresse: </label></td>
							<td><input type="text" name="adresse" id="adresse" size="25" maxlength="60" required="required"></td>
						</tr>
						<tr>
							<td><label for="cp">Code Postal: </label></td>
							<td><input type="text" name="cp" id="cp" size="8" maxlength="5" required="required"></td>
						</tr>
					</table>
					<table cellspacing="8" class="utilisateur">
						<tr>
							<td><label for="mail">Email: </label></td>
							<td><input type="mail" name="mail" id="mail" maxlength="255" size="25"
							required="required"></td>
						</tr>
						<tr>
							<td><label for="pseudo">Pseudo: </label></td>
							<td><input type="text" name="pseudo" id="pseudo" maxlength="25" size="25"
							required="required"></td>
						</tr>
						<tr>
							<td><label for="mdp">Mot de passe: </label></td>
							<td><input type="password" name="mdp" id="mdp" size="25" maxlength="255" required="required"></td>
						</tr>
						<tr>
							<td><label for="mdp_confirm">Confirmez le: </label></td>
							<td><input type="password" name="mdp_confirm" id="mdp_confirm" size="25" maxlength="255" required="required"></td>
						</tr>						
						<tr>
							<td><input type="submit" value="S'enregistrer" class="myButtonLarge" name="inscription"></td>
							<td><input type="reset" value="Réinitialiser" class="myButtonLarge"></td>
						</tr>
					</table>
				</form>
			</div>

      		
	        <div class="col-xs-12 col-sm-12 col-md-6">
	       		<h2 class="subtitle">Deja membre ?</h2>
				<form method="post" action="">
					<table cellspacing="8" class="client">
						<tr>
							<td><label for="pseudoConnexion">Pseudo: </label></td>
							<td><input type="text" name="pseudoConnexion" id="pseudoConnexion" maxlength="25" size="25"
							required="required"></td>
						</tr>
						<tr>
							<td><label for="mdpConnexion">Mot de passe: </label></td>
							<td><input type="password" name="mdpConnexion" id="mdpConnexion" size="25" maxlength="255" required="required"></td>
						</tr>
					</table>
					<table cellspacing="8" class="utilisateur">
						<tr>
							<td><input type="submit" value="Se connecter" class="myButtonLarge" name="connexion"></td>
							<td><input type="reset" value="Réinitialiser" class="myButtonLarge"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</main>
