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

		<form enctype="multipart/form-data" action="creationCompte.php" method="POST" class="">
			<fieldset>
			 <legend>Informations personnelles</legend>
				Genre :
				<select name="genre" required>
					<option>M.</option>
					<option>Mme</option>
				</select></br>
				  <label for="nom">Nom</label>
				  <input name="nom" placeholder="Entrez votre nom" required=""><br>
      			  <label for="Prenom">Prenom</label>
      			  <input name="prenom" placeholder="Entrez votre prenom" required=""><br>
     			  <label for="dob">Date de naissance</label>
        		  <input name="dob" type="date" required=""><br>
      			  <label for="job">Profession</label>
                  <input name="job" placeholder="Entrez votre profession" required=""><br>
     			  <label for="Adresse">Adresse</label>
        		  <input name="adresse" placeholder="Entrez votre adresse" required=""><br>
     			  <label for="codePostal">Code postal</label>
        		  <input name="codePostal" placeholder="Code postal" required=""><br>
     			  <label for="ville">Ville</label>
     			  <input name="ville" placeholder="Ville" required=""><br>
     			  <label for="numero">Numéro de téléphone portable</label>
     			  <input name="numero" placeholder="ex :0*********" type="tel" required="" pattern="06[0-9]{8}"><br>
     			  <label for="mail">Adresse mail</label>
     			  <input name="mail" placeholder="Mail" required><br>
     			  <label for="numContrat">Numero de contract</label>
     			  <input name="numContrat" placeholder="Numéro de contract" required=""><br>
			</fieldset>
			<fieldset>
			 <legend>Informations sur le véhicule</legend>
				  <label for="A">Numéro d’immatriculation du véhicule (A)</label>
				  <input name="A" type="text" required=""><br>
				  <label for="E">Numéro d’authentication du véhicule (E)</label>
				  <input name="E" type="text" required=""><br>
				  <label for="date_first_immat">Date de 1re immatriculation du véhicule (B)</label>
				  <input name="date_first_immat" type="date" required=""><br>
				  <label for="D1">Marque (D.1)</label>
				  <input name="D1" type="text" required=""><br>
				  <label for="D2">Type, variante, version (D.2)</label>
				  <input name="D2" type="text" required=""><br>
				  <label for="J1">Genre national (J.1)</label>
				  <input name="J1" type="text" required=""><br>
				  <label for="D3">Dénomination commerciale (D.3)</label>
				  <input name="D3" type="text" required=""><br>
				  <label for="kilometre">Kilométrage inscrit au compteur du véhicule</label>
				  <input name="kilometre" type="text" required=""><br>
			</fieldset>
			<fieldset>
			 <legend>Informations sur le véhicule</legend>
				  <label for="CG">Carte grise</label>
				  <input name="CG" type="file"required=""><br>
	  			  <label for="CA">Contrat d'assurance</label>
	  			  <input name="CA" type="file" required=""><br>
				  <label for="CV">Carte verte</label>
				  <input name="CV" type="file"required=""><br>
	  			  <label for="permis">Permis de conduire</label>
	  			  <input name="permis" type="file" required=""><br>
	  			  <label for="justificatif">Justificatif de domicile</label>
	  			  <input name="justificatif" type="file" required=""><br>
			</fieldset>
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
