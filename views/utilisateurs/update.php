<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/head.php');
?>
	<link rel="stylesheet" href="assets\css\background\vortex.css">
	<link rel="stylesheet" href="assets\css\account\update.css">
	<title>
		Modifier mes informations
	</title>
</head>
<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/header.php');
?>
	
	<div class="container-fluid">
		<div class="row">
			<h1>Je veux modifier mes infos</h1>

			<form method="post" action="">
					<table cellspacing="8" class="client">
						<tr>
							<td><label for="ville">Ville: </label></td>
							<td><input type="text" name="ville" id="ville" size="25" maxlength="40" required="required" value="<?php echo $_SESSION['ville']; ?>"></td>
						</tr>
						<tr>
							<td><label for="adresse">Adresse: </label></td>
							<td><input type="text" name="adresse" id="adresse" size="25" maxlength="60" required="required" value="<?php echo $_SESSION['adresse'] ?>"></td>
						</tr>
						<tr>
							<td><label for="cp">Code Postal: </label></td>
							<td><input type="text" name="cp" id="cp" size="8" maxlength="5" required="required" value="<?php echo $_SESSION['cp'] ?>"></td>
						</tr>
						<tr>
							<td><label for="mail">Mail: </label></td>
							<td><input type="text" name="mail" id="mail" size="25" maxlength="255" required="required" value="<?php echo $_SESSION['mail'] ?>"></td>
						</tr>
						<tr>
							<td align="center"><input type="submit" class="myButtonMini" value="Modifier mes informations"></td>
							<td rowspan="2" align="center"><a href="index.php?c=utilisateur&a=account" class="myButtonMini">Retour</a></td>	        				
	        			</tr>
						<tr>
							<td align="center"><a href="index.php?c=utilisateur&a=updatemdp&id_utilisateur=<?php echo $_SESSION['idUtilisateur'] ?>" class="myButtonMini">Modifier le mot de passe</a></td>	
	        			</tr>
					</table>
				</form>