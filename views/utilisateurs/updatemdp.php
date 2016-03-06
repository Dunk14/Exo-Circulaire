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
			<h1>Je veux modifier mon mot de passe</h1>

			<form method="post" action="">
				<table cellspacing="8" class="client">
					<tr>
						<td><label for="mdpActuel">Mot de passe actuel: </label></td>
						<td><input type="password" maxlength="255" required="required" autofocus="autofocus" name="mdpActuel" id="mdpActuel"></td>
					</tr>
					<tr>
						<td><label for="nouveauMdp">Nouveau mot de passe: </label></td>
						<td><input type="password" maxlength="255" required="required" autofocus="autofocus" name="nouveauMdp" id="nouveauMdp"></td>
					</tr>
					<tr>
						<td><label for="confirmMdp">Confirmez le: </label></td>
						<td><input type="password" maxlength="255" required="required" autofocus="autofocus" name="confirmMdp" id="confirmMdp"></td>
					</tr>
					<tr>
						<td align="center" colspan="2"><input type="submit" class="myButtonMini" value="Changer le mot de passe"></td>
					</tr>
				</table>
			</form>