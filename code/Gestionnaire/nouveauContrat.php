<?php
session_start();
?>
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
			<table>
				<tr><td colspan="2"><strong>Informations assuré</strong></td></tr>
				<tr><td>Genre :</td>
				<td><select name="genre" required>
					<option>M.</option>
					<option>Mme</option>
				</select></td></tr>
				<tr><td>Nom :<input type="text" name="nom" required></tr></td>
				<tr><td>Prénom :<input type="text" name="prenom" required></tr></td>
				<tr><td>Date De Naissance : <input type="date" name="dob" required></tr></td>
				<tr><td>Profession : <input type="text" name="job" required></tr></td>
				<tr><td>Adresse : <input type="text" name="adresse" required></tr></td>
				<tr><td>Code Postal : <input type="text" name="codePostal" required></tr></td>
				<tr><td>Ville : <input type="text" name="ville" required></tr></td>
				<tr><td>Numéro Portable : <input type="number" name="numero" required></tr></td>
				<tr><td>Adresse Mail : <input type="email" name="mail" required></tr></td>
				<tr><td>Numéro de contrat : <input type="number" name="numContrat" required></tr></td>
				<tr><td>Carte grise :<br><input type="file" name="CG" required></tr></td>
				<tr><td>Contrat d'assurance :<br><input type="file" name="CA" required></tr></td>
				<tr><td>Carte verte :<br><input type="file" name="CV" required></tr></td>
				<tr><td>Permis de conduire :<br><input type="file" name="permis" required></tr></td>
				<tr><td>Justificatif de domicile :<br><input type="file" name="justificatif" required></tr></td>
				
				<tr><td colspan="2"><strong>Informations sur le véhicule</strong></td></tr>
				<tr><td>Numéro d’immatriculation du véhicule (A) : </td><td><input type="text" name="A" required></td></tr>
				
				<tr><td>Numéro d’identification du véhicule (E) : </td><td><input type="text" name="E" required></td></tr>
				
				<tr><td>Date de 1re immatriculation du véhicule <br>(JJ/MM/AAAA) (B) :</td><td><input type="date" name="date_first_immat" required></td></tr>
				
				<tr><td>Marque (D.1) :  </td><td><input type="text" name="D1" required></td></tr>
				
				<tr><td>Type, variante, version (D.2) : </td><td><input type="text" name="D2" required></td></tr>
				
				<tr><td>Genre national (J.1) : </td><td><input type="text" name="J1" required></td></tr>
				
				<tr><td>Dénomination commerciale (D.3) : </td><td><input type="text" name="D3" required></td></tr>
				
				<tr><td>Kilométrage inscrit au compteur du véhicule : </td><td><input type="text" name="kilometre" required></td></tr>
  			</table>
			<input type="submit" value="ajouter" class="bouton">
			<input type="reset" value="Réinitialiser" class="bouton">	
		</form>
	</div>
		<!-- bouton de déconnexion -->
	<form method="POST" action="../deconnexion.php">
		<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
	</form>
	</body>
</html>
