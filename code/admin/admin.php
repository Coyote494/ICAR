<!DOCTYPE html>
<html>
	<head>
		<title>ADMINISTRATEUR</title>
	</head>
	<body>
		<form action='newContract.php' method='POST'>
			<p>Nom officiel de l'agence <input type="text" name="nom" required></p>
			<input type="submit" value="entrer un nouvelle agence" class="bouton">
		</form>
			<!-- bouton de déconnexion -->
		<form method="POST" action="../deconnexion.php">
			<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
		</form>
	</body>
</html>