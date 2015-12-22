<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Insertion</title>
</head>
<body>

<?php if (empty($_POST)) {
	?>
	<form method="post">
		<table>
			<tr>
				<td><label for="nom">Nom: </label></td>
				<td><input type="text" name="nom" id="nom" maxlength="50" size="30" autofocus="autofocus"
				required="required" placeholder="30 caractères max"></td>
			</tr>
			<tr>
				<td><label for="diametre">Diametre: </label></td>
				<td><input type="number" name="diametre" id="diametre" size="30"></td>
			</tr>
			<tr>
				<td><label for="masse">Masse: </label></td>
				<td><input type="number" name="masse" id="masse" size="30"></td>
			</tr>
			<tr>
				<td><label for="gravite">Gravité: </label></td>
				<td><input type="number" name="gravite" id="gravite" size="30"></td>
			</tr>
		</table>
	</form>
	<?php
}
else {
	
}

	

</body>
</html>