<?php
session_start();
if (!isset($_SESSION["nom"])) {
    header("Location: Accueil.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Recherche</title>
		<link rel="stylesheet" type="text/css" href="./CSS/rechercherContrat.css" />
	</head>
	<body>
		<div class="bandeau"> 
			<img src="../img/logo.png">
        <h2>Recherche Contrat</h2>
    	</div>

   		<div class="voiture-rtl">
        	<div><img src="img/voiture.png"></div>
    	</div>

		<div class="formulaire">
			<p>Nom :<input type="text" id="nom" name="nom" required></p>
			<p>Prénom :<input type="text" id="prenom" name="prenom" required></p>
			<p>Téléphone :<input type="number" id="tel" name="tel"></p>
			<p>Adresse mail :<input type="email" id="email" name="email"></p>
			<p>Numéro de Contract :<input type="number" id="numero" name="numero"></p>
			<button type="button" class="bouton" onclick="search()">Rechercher</button>
			<div id="resultat"></div>
			<script>
				function search(){
					nom = document.getElementById("nom").value;
					prenom = document.getElementById("prenom").value;
					tel = document.getElementById("tel").value;
					email = document.getElementById("email").value;
					numero = document.getElementById("numero").value;
					xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function(){
						if(this.readyState == 4 && this.status == 200){
							document.getElementById("resultat").innerHTML = this.responseText;
						}
					};
					xhttp.open("POST", "recherche.php", true);
					xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					xhttp.send("nom="+nom+"&prenom="+prenom+"&tel="+tel+"&email="+email+"&numero="+numero);
				}
			</script>
		</div>
		<!-- bouton de déconnexion -->
		<form method="POST" action="../deconnexion.php">
			<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
		</form>
	</body>
</html>

