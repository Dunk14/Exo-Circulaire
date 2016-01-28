<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/headadmin.php');
?>

	<link rel="stylesheet" href="../assets\css\background\inaccessible.css">
	<link rel="stylesheet" href="../assets/css/admin/update.css">
	<title>
		Panel Admin
	</title>
</head>

<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'exo-circulaire/views/headeradmin.php');
?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">

			<table>
				<tr>
					<th>Nom: </th>
					<td><input type="text" name="nom" size="25" maxlength="50" required="required" autofocus="autofocus" placeholder="50 Caractères max"></td>
				</tr>
				<tr>
					<th>Description: </th>
					<td><textarea name="description" placeholder="255 caractères max" rows="10" cols="50" maxlength="255"></textarea>></td>
				</tr>
				<tr>
					<th>Diamètre: </th>
					<td><input type="number" name="diametre" size="25" placeholder="Type: double"></td>
				</tr>
				<tr>
					<th>Gravité: </th>
					<td><input type="number" name="gravity" size="25" placeholder="Type: float"></td>
				</tr>
				<tr>
					<th>Température: </th>
					<td><input type="number" name="temperature" size="25" placeholder="Type: int"></td>
				</tr>
				<tr>
					<th>Lune(s): </th>
					<td><input type="number" name="lunes" size="25" placeholder="Nombre de lunes"></td>
				</tr>
				<tr>
					<th>Prix: </th>
					<td><input type="number" name="prix" size="25" required="required" placeholder="Type: Decimal 15,3"></td>
				</tr>
				<tr>
					<th>Quantité: </th>
					<td><input type="number" name="quantite" size="25" min="0" max="1" value="1" required="required" autofocus="autofocus" placeholder="50 Caractères max"></td>
				</tr>
				<tr>
					<th>URL Image: </th>
					<td><input type="text" name="urlImage" size="50" maxlength="255" required="required" value="exo-circulaire\assets\img\products\"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" class="myButtonMini" id="submit"></td>
				</tr>
			</table>
		</div>
	</div>
</div>