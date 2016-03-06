<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/head.php');
?>
	<link rel="stylesheet" href="assets\css\background\doublering.css">
	<link rel="stylesheet" href="assets\css\article\finalizepanier.css">
	<title>
		Confirmation du panier
	</title>
</head>
<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/header.php');
?>
	<main class="container">
      	<div class="row">
      		<h1 class="titre">Votre panier</h1>

      		<div class="col-xs-12 col-sm-12 col-md-6">

      			<h1 class="subtitle">Articles du panier</h1>
      		<?php 
      			for ($i=0; $i < $_SESSION['sizePanier']; $i++) { 
      				?>
      				<div class="panier__article">
      					<h2><?php echo $_SESSION['panier'][$i]['nom']; ?></h2>
      					<ul>
      						<li><strong>Prix: </strong><?php echo $_SESSION['panier'][$i]['prix']; ?> €</li>
      					</ul>
      				</div>
      				<?php
      			}
      		?>

      		</div>

      		<div class="col-xs-12 col-sm-12 col-md-6">
      			
      				<h1 class="subtitle">Vos informations</h1>
      				
      				<div class="infos">
      					<table>
      						<tr>
      							<th>Nom: </th>
      							<td><?php echo $_SESSION['nom']; ?></td>
      						</tr>
      						<tr>
      							<th>Prénom: </th>
      							<td><?php echo $_SESSION['prenom']; ?></td>
      						</tr>
      						<tr>
      							<th>Ville: </th>
      							<td><?php echo $_SESSION['ville'].' '.$_SESSION['cp']; ?></td>
      						</tr>
      						<tr>
      							<th>Adresse: </th>
      							<td><?php echo $_SESSION['adresse']; ?></td>
      						</tr>
      						<tr>
      							<th>Mail: </th>
      							<td><?php echo $_SESSION['mail']; ?></td>
      						</tr>
      					</table>
      				</div>
      			</div>
      		</div>

      		<a href="index.php?c=utilisateur&a=purchase"><div class="purchase">Je veux commander !</div></a>

      	</div>
    </main>

      			
