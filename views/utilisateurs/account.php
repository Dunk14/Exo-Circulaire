<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/head.php');
?>
	<link rel="stylesheet" href="assets\css\background\doublering.css">
	<link rel="stylesheet" href="assets\css\account\account.css">
	<title>
		Compte-Exo-Circulaire
	</title>
</head>
<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/header.php');
?>
	<main class="container">
      	<div class="row">
      		<h1 class="titre">Vos Infos Personnelles</h1>
	        <div class="col-xs-12 col-sm-12 col-md-6">

	        	<div class="user__infos">
	        		<h2 class="subtitle"><?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></h2>

	        		<table cellspacing="8" align="center">
	        			<tr>
	        				<th>Ville: </th>
	        				<td><?php echo $_SESSION['ville']; ?></td>
	        			</tr>
	        			<tr>
	        				<th>Adresse: </th>
	        				<td><?php echo $_SESSION['adresse']; ?></td>
	        			</tr>
	        			<tr>
	        				<th>Code Postal: </th>
	        				<td><?php echo $_SESSION['cp']; ?></td>
	        			</tr>
	        			<tr>
	        				<th>Mail: </th>
	        				<td><?php echo $_SESSION['mail']; ?></td>
	        			</tr>
	        			<tr>
	        				<th>Pseudo: </th>
	        				<td><?php echo $_SESSION['pseudo']; ?></td>
	        			</tr>
	        			<tr>
	        				<th>Date d'inscription: </th>
	        				<td><?php echo $_SESSION['dateArrivee']; ?></td>
	        			</tr>
	        			<tr>
	        				<td colspan="2" align="center"><a href="index.php?c=utilisateur&a=update&id_utilisateur=<?php echo $_SESSION['idUtilisateur']; ?>" class="myButtonMini">Modifier mes informations</a></td>
	        			</tr>
	        		</table>

	        	</div>

	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-6">
	        	
	        	<div class="user__orders">
	        		<h2 class="subtitle">Commandes</h2>

	        		<div class="row">
	        			<div class="col-xs-12 col-sm-12 col-md-12">
		        			<?php 
		        			require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/controllers/commande.php');
		        			$commande = new Controller_Commande();
		        			$listCommandes = $commande->listCommandes($_SESSION['idUtilisateur']);
		        			if ($listCommandes == 0) {
		        				echo '<div class="title__orders">';
		        				echo 'Vous n\'avez pas encore procédé à quelconque commande';
		        				echo '</div>';
		        			}
		        			else {
		        				echo '<div class="title__orders">';
		        				echo '<span style="margin-right:40px;">Date de commande</span>';
		        				echo '<span>Prix</span>';
		        				echo '</div>';

		        				foreach ($listCommandes as $commandes) {
		        					echo '<a href="index.php?c=utilisateur&a=vieworder&id_commande='.$commandes['id_commande'].'&id_utilisateur='.$commandes['id_utilisateur'].'" class="commande" style="text-decoration:none;">';
		        					echo '<div class="orders">';
		        					echo '<span class="order__time">'.$commandes['date_commande'].'</span>';
		        					echo '<span class="order__price">'.number_format($commandes['prix'], 2, ',', ' ').' €</span>';
		        					echo '</div>';
		        					echo '</a>';
		        				}

		        			}
		        			?>
	        		</div>
	        		
	        	</div>

	        </div>

	    </div>
	</main>

</body>
</html>