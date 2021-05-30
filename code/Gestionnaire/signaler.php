<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Signaler un problème</title>
	</head>
	<body>
		<fieldset>
			<legend>Signaler un problème</legend>
			<form method="post" action="enregistrer_probleme.php">
				<label for="probleme"></label>
				<input name="probleme" placeholder="Décriver l'erreur rencontrée :" required="" size="100"><br>
				<input type="submit" value="Signaler" class="bouton">
			</form>
		</fieldset>
		<?php
			header('Location: gestionnaire.php');
		?>
	</body>
</html>