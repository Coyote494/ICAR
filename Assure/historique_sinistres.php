<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Historique des sinistres</title>
		<meta charset="utf-8">
	</head>
	<body>

		<!-- bouton de déconnexion -->
		<form method="POST" action="deconnexion.php">
			<input type="submit" name="OUT" value="Déconnexion"/>
		</form>

        <div>Historique des sinistres</div>
		<?php
			$path = "/client/".$_SESSION["assurance"].$_SESSION["nom"][0]
		?>


	</body>
</html>