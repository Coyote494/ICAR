<!DOCTYPE html>
<html>
	<head>
		<title>Recherche</title>
	</head>
	<body>
		<p>Nom :<input type="text" id="nom" name="nom" required></p>
		<p>Prénom :<input type="text" id="prenom" name="prenom" required></p>
		<p>Téléphone :<input type="number" id="tel" name="tel"></p>
		<p>Adresse mail :<input type="email" id="email" name="email"></p>
		<p>Numéro de Contract :<input type="number" id="numero" name="numero"></p>
		<button type="button" onclick="search()">Rechercher</button>
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
	</body>
</html>

