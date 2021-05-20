<?php
	setcookie($_COOKIE['modif_donnees'], "", time() - 3600);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Confirmation</title>
	<head>
	<body>
		<div>Changement effectué avec succés</div>
		<form action="changementCoordonees.php">
			<input type="submit" value="retour aux demandes" class="button">
		</form>
	</body>
</html>
