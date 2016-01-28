<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/headadmin.php');
?>

	<link rel="stylesheet" href="../assets\css\background\inaccessible.css">
	<link rel="stylesheet" href="../assets/css/admin/panel.css">
	<title>
		Panel Admin
	</title>
</head>

<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/headeradmin.php');
?>

	<div class="container">
      	<div class="row">
      		<div class="col-xs-12 col-sm-12 col-md-2"></div>
	        <main class="col-xs-12 col-sm-12 col-md-8">

	        	<div>
	        		<h1>Bienvenue dans le panel <?php echo $_SESSION['prenomAdmin'].' '.$_SESSION['nomAdmin']; ?></h1>
	        		<h2>En tant qu'administrateur, vous pouvez modifier, supprimer, ajouter des produits ou des clients</h2> 
	        	</div>

	        </main>
	        <div class="col-xs-12 col-sm-12 col-md-2"></div>
	    </div>
	</div>

</body>
</html>