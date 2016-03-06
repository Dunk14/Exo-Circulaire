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

	<h1>Liste des Utilisateurs</h1>

	<?php foreach ($listUtilisateurs as $utilisateur) { 
				echo '

					<div class="col-xs-11 col-sm-11 col-md-6">
						<div id="utilisateur">
							<table>
								<tr>
									<th>ID Utilisateur: </th>
									<td>'.$utilisateur['id_utilisateur'].'</td>
								</tr>
								<tr>
									<th>ID Client: </th>
									<td>'.$utilisateur['id_client'].'</td>
								</tr>
								<tr>
									<th>Pseudo: </th>
									<td>'.$utilisateur['pseudo'].'</td>
								</tr>
								<tr>
									<th>Prénom: </th>
									<td>'.$utilisateur['prenom'].'</td>
								</tr>
								<tr>
									<th>Nom: </th>
									<td>'.$utilisateur['nom'].'</td>
								</tr>
							</table>
							<table>
								<tr>
									<th>Ville: </th>
									<td>'.$utilisateur['ville'].' '.$utilisateur['cp'].'</td>
								</tr>
								<tr>
									<th>Adresse: </th>
									<td>'.$utilisateur['adresse'].'</td>
								</tr>
								<tr>
									<th>Mail: </th>
									<td>'.$utilisateur['mail'].'</td>
								</tr>
								<tr>
									<th>Date d\'inscription: </th>
									<td>'.$utilisateur['dateArrivee'].'</td>
								</tr>
								<tr>
									<td colspan="2"><a class="myButtonMini" href="index.php?c=admin&a=confirmDeleteClient&id_client='.$utilisateur['id_client'].'">Supprimer ce client</a></td>
								</tr>
							</table>
						</div>
					</div>';
			} 

			?>