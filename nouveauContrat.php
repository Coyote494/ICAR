<!DOCTYPE html>
<html>
	<head>
		<title>Nouveau Contract</title>
	</head>
	<body>
		<form action="creationCompte.php" method="POST" class="">
			<p>Nom :<input type="text" name="nom" required></p>
			<p>Prénom<input type="text" name="prenom" required></p>
			<select name="genre" required>
				<option>Mr</option>
				<option>Mme</option>
			</select>
			<p>Date De Naissance: <input type="date" name="dob" required></p>
			<p>profession: <input type="text" name="job" required></p>
			<p>Adresse: <input type="text" name="adresse" required></p>
			<p>Code Postal: <input type="text" name="codePostal" required></p>
			<p>Ville: <input type="text" name="ville" required></p>
			<p>Numéro Portable: <input type="number" name="numero" required></p>
			<p>Adresse Mail: <input type="email" name="mail" required></p>
			<p>Numéro de contrat: <input type="number" name="numContrat" required></p>
			<input type="submit" value="ajouter">
			<input type="reset" value="Réinitialiser">	
		</form>
	</body>
</html>
