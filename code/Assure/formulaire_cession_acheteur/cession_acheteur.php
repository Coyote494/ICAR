<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Certificat de cession acheteur</title>
		<meta charset="utf-8">
	</head>
	<body>

	<!-- bouton de déconnexion -->
	<form method="POST" action="../deconnexion.php">
		<input type="submit" name="OUT" value="Déconnexion"/>
	</form>

	<form method ="post" action ="m">
		<table>
			
			<tr><td>Numéro d’immatriculation du véhicule (A) : </td><td><input type="text" name="A"></td></tr>
			
			<tr><td>Numéro d’identification du véhicule (E) : </td><td><input type="text" name="E"></td></tr>
			
			<tr><td>Date de 1re immatriculation du véhicule <br>(JJ/MM/AAAA) (B) :</td><td><input type="date" name="date_first_immat"></td></tr>
			
			<tr><td>Marque (D.1) :  </td><td><input type="text" name="D1"></td></tr>
			
			<tr><td>Type, variante, version (D.2) : </td><td><input type="text" name="D2"></td></tr>
			
			<tr><td>Genre national (J.1) : </td><td><input type="text" name="J1"></td></tr>
			
			<tr><td>Dénomination commerciale (D.3) : </td><td><input type="text" name="D3"></td></tr>
			
			<tr><td>Kilométrage inscrit au compteur du véhicule : </td><td><input type="text" name="kilometre"></td></tr>
			
			<tr><td>Présence du certificat d’immatriculation :  </td>
				<td><input type="radio" id="oui" name="presence_certificat" value="oui">
  				<label for="oui">Oui</label><br>
 				<input type="radio" id="non" name="presence_certificat" value="non">
  				<label for="non">Non</label><br></td></tr>

		</table>
	</form>

	</body>
</html>