<!DOCTYPE html>
<html>
	<head>
		<title>Nouveau Contract</title>
		<link rel="stylesheet" type="text/css" href="./CSS/nouveauContrat.css" />
	</head>
	<body>

	<div class="bandeau"> 
		<img src="../img/logo.png">
        <h2>Nouveau Contrat</h2>
    </div>

    <div class="voiture-rtl">
        <div><img src="img/voiture.png"></div>
    </div>

    <div class="formulaire">
		<form enctype="multipart/form-data" action="creationCompte.php" method="POST" class="">
			<select name="genre" required>
				<option>M.</option>
				<option>Mme</option>
			</select>
			<p>Nom :<input type="text" name="nom" required></p>
			<p>Prénom :<input type="text" name="prenom" required></p>
			<p>Date De Naissance : <input type="date" name="dob" required></p>
			<p>Profession : <input type="text" name="job" required></p>
			<p>Adresse : <input type="text" name="adresse" required></p>
			<p>Code Postal : <input type="text" name="codePostal" required></p>
			<p>Ville : <input type="text" name="ville" required></p>
			<p>Numéro Portable : <input type="number" name="numero" required></p>
			<p>Adresse Mail : <input type="email" name="mail" required></p>
			<p>Numéro de contrat : <input type="number" name="numContrat" required></p>
			<p>Carte grise :<br><input type="file" name="CG" required></p>
			<p>Contrat d'assurance :<br><input type="file" name="CA" required></p>
			<p>Carte verte :<br><input type="file" name="CV" required></p>
			<p>Permis de conduire :<br><input type="file" name="permis" required></p>
			<p>Justificatif de domicile :<br><input type="file" name="justificatif" required></p>
			<input type="submit" value="ajouter" class="bouton">
			<input type="reset" value="Réinitialiser" class="bouton">	
		</form>
	</div>
	</body>
</html>
