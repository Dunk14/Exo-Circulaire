<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/headadmin.php');
?>

	<link rel="stylesheet" href="../assets\css\background\inaccessible.css">
	<link rel="stylesheet" href="../assets/css/admin/utilisateurs.css">
	<title>
		Panel Admin
	</title>
</head>

<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/headeradmin.php');
?>

	<h1>Etes-vous sur de supprimer ?</h1>

	<div class="col-xs-11 col-sm-11 col-md-11" id="utilisateur">
		<table>
			<tr>
				<th>ID Utilisateur: </th>
				<td><?php echo $viewClient['id_utilisateur']; ?></td>
			</tr>
			<tr>
				<th>ID Client: </th>
				<td><?php echo $viewClient['id_client']; ?></td>
			</tr>
			<tr>
				<th>Pseudo: </th>
				<td><?php echo $viewClient['pseudo']; ?></td>
			</tr>
			<tr>
				<th>Prénom: </th>
				<td><?php echo $viewClient['prenom']; ?></td>
			</tr>
			<tr>
				<th>Nom: </th>
				<td><?php echo $viewClient['nom']; ?></td>
			</tr>
		</table>
		<table>
			<tr>
				<th>Ville: </th>
				<td><?php echo $viewClient['ville'].' '.$viewClient['cp']; ?></td>
			</tr>
			<tr>
				<th>Adresse: </th>
				<td><?php echo $viewClient['adresse']; ?></td>
			</tr>
			<tr>
				<th>Mail: </th>
				<td><?php echo $viewClient['mail']; ?></td>
			</tr>
			<tr>
				<th>Date d'inscription: </th>
				<td><?php echo $viewClient['dateArrivee']; ?></td>
			</tr>
			<tr>
				<form method="post" action="">
					<td colspan="2"><input type="password" size="25" required="required" name="passwordAdmin" placeholder="Votre mot de passe"></td>	
			</tr>
		</table>
		<table>
			<tr>
				<td colspan="2"><input type="submit" class="myButtonMini" value="Supprimer"></td>
				</form>
			</tr>
		</table>
	</div>