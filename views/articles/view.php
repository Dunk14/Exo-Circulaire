<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/head.php');
?>
	<link rel="stylesheet" href="assets\css\background\doublering.css">
	<link rel="stylesheet" href="assets\css\form\account.css">
	<title>
		Compte-Exo-Circulaire
	</title>
</head>
<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/header.php');
?>
	<main class="container">
      	<div class="row">
      		<h1 class="titre">Compte</h1>
	        <div class="col-xs-12 col-sm-12 col-md-6">


<?php

	echo '<p>Nom: '.$articleDetails['nom'].'</p>';
	echo '<p>Diametre: '.$articleDetails['diametre'].'</p>';
	echo '<p>Masse: '.$articleDetails['masse'].'</p>';
	echo '<p>Gravité: '.$articleDetails['gravity'].'</p>';
	echo '<p>Température: '.$articleDetails['temperature'].' C°</p>';
	echo '<p>ATM: '.$articleDetails['atm'].'</p>';
	echo '<p>Révolution: '.$articleDetails['revolution'].'</p>';
	echo '<p>Axial: '.$articleDetails['axial'].'</p>';
	echo '<p>Lunes: '.$articleDetails['lunes'].'</p>';
	echo '<p>Longitude: '.$articleDetails['longitude'].'</p>';
	echo '<p>Latitude: '.$articleDetails['latitude'].'</p>';

?>

</body>
</html>