<?php
session_start();
if (!isset($_SESSION["nom"])) {
    header("Location: ../Accueil.php");
    exit();
}
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
		<form method="POST" action="../deconnexion.php">
		    <input type="submit" name="OUT" value="Déconnexion" class="bouton" />
		</form>
	</body>
</html>