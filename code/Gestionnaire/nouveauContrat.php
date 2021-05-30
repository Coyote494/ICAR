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

		<form enctype="multipart/form-data" action="creationCompte.php" method="POST" class="">
			<fieldset>
			 <legend>Informations personnelles</legend>
				Genre :
				<select name="genre" required>
					<option>M.</option>
					<option>Mme</option>
				</select></br>
				  <label for="nom">Nom</label>
				  <input id="nom" placeholder="Entrez votre nom" required=""><br>
      			  <label for="Prenom">Prenom</label>
      			  <input id="prenom" placeholder="Entrez votre prenom" required=""><br>
     			  <label for="Date">Date de naissance</label>
        		  <input id="Date" type="date" required=""><br>
      			  <label for="profession">Profession</label>
                  <input id="profession" placeholder="Entrez votre profession" required=""><br>
     			  <label for="Adresse">Adresse</label>
        		  <input id="adresse" placeholder="Entrez votre adresse" required=""><br>
     			  <label for="code">Code postal</label>
        		  <input id="nom" placeholder="Code postal" required=""><br>
     			  <label for="ville">Ville</label>
     			  <input id="nom" placeholder="Ville" required=""><br>
     			  <label for="tel">Numéro de téléphone portable</label>
     			  <input id="tel" placeholder="ex :06********" type="tel" required="" pattern="06[0-9]{8}"><br>
     			  <label for="mail">Adresse mail</label>
     			  <input id="mail" placeholder="Mail" required="" pattern="[a-zA-Z]*.[a-zA-Z]*@polytechnique.edu"><br>
     			  <label for="contrat">Numero de contract</label>
     			  <input id="contrat" placeholder="Numéro de contract" required=""><br>
			</fieldset>
			<fieldset>
			 <legend>Informations sur le véhicule</legend>
				  <label for="cg">Carte grise</label>
				  <input id="cg" type="file"required=""><br>
      			  <label for="CA">Contract d'assurance</label>
      			  <input id="CA" type="file" required=""><br>
				  <label for="cv">Carte verte</label>
				  <input id="cv" type="file"required=""><br>
      			  <label for="permis">Permis de conduire</label>
      			  <input id="permis" type="file" required=""><br>
      			  <label for="jd">Justificatif de domicile</label>
      			  <input id="jd" type="file" required=""><br>
			</fieldset>
			<fieldset>
			 <legend>Informations sur le véhicule</legend>
				  <label for="nom">Numéro d’immatriculation du véhicule (A)</label>
				  <input id="nom" type="text" required=""><br>
				  <label for="nom">Numéro d’identification du véhicule (E)</label>
				  <input id="nom" type="text" required=""><br>
				  <label for="nom">Date de 1re immatriculation du véhicule (B)</label>
				  <input id="nom" type="text" required=""><br>
				  <label for="nom">Marque (D.1)</label>
				  <input id="nom" type="text" required=""><br>
				  <label for="nom">Type, variante, version (D.2)</label>
				  <input id="nom" type="text" required=""><br>
				  <label for="nom">Genre national (J.1</label>
				  <input id="nom" type="text" required=""><br>
				  <label for="nom">Dénomination commerciale (D.3)</label>
				  <input id="nom" type="text" required=""><br>
				  <label for="nom">Kilométrage inscrit au compteur du véhicule</label>
				  <input id="nom" type="text" required=""><br>
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
