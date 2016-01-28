<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/head.php');
?>

	<link rel="stylesheet" href="assets\css\background\inaccessible.css">
	<link rel="stylesheet" href="assets/css/errors/inaccessible.css">

	<title>
		Page Inaccessible
	</title>
</head>

<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/header.php');
?>

	<div class="container-fluid">
		<div class="row">
			<main class="col-xs-12 col-sm-12 col-md-12">

				<h1>Page inaccessible pour vous, veuillez accepter mes plus plates condoléances</h1>

				<h2>Redirection dans <span id="redirection"></span></h2>

			</main>
		</div>
	</div>
	<script src="assets/js/inaccessible.js"></script>