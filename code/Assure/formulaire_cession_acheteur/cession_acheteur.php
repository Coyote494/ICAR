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
			<tr><td colspan="2"><strong>Information sur le véhicule</strong></td></tr>
			<tr><td>Numéro d’immatriculation du véhicule (A) : </td><td><input type="text" name="A"></td></tr>
			
			<tr><td>Numéro d’identification du véhicule (E) : </td><td><input type="text" name="E"></td></tr>
			
			<tr><td>Date de 1re immatriculation du véhicule <br>(JJ/MM/AAAA) (B) :</td><td><input type="date" name="date_first_immat"></td></tr>
			
			<tr><td>Marque (D.1) :  </td><td><input type="text" name="D1"></td></tr>
			
			<tr><td>Type, variante, version (D.2) : </td><td><input type="text" name="D2"></td></tr>
			
			<tr><td>Genre national (J.1) : </td><td><input type="text" name="J1"></td></tr>
			
			<tr><td>Dénomination commerciale (D.3) : </td><td><input type="text" name="D3"></td></tr>
			
			<tr><td>Kilométrage inscrit au compteur du véhicule : </td><td><input type="text" name="kilometre"></td></tr>
			
			<tr><td>Présence du certificat d’immatriculation :  </td>
				<td><input type="radio" id="oui_certif" name="presence_certificat" value="oui">
  				<label for="oui_certif">Oui</label>
 				<input type="radio" id="non_certif" name="presence_certificat" value="non">
  				<label for="non_certif">Non</label></td></tr>
				
			<br>
			<br>
			<tr><td colspan="2"><strong>Information sur l'ancien propriétaire</strong></td></tr>
			<tr><td>Vous êtes ? </td>
				<td><input type="radio" id="oui_old_proprio" name="old_proprio" value="oui">
  				<label for="oui_old_proprio">Oui</label>
 				<input type="radio" id="non_old_proprio" name="old_proprio" value="non">
  				<label for="non_old_proprio">Non</label></td></tr>
			
			<tr><td>N° de la voie :</td><td><input type="text" name="old_numero_voie"></td></tr>
			
			<tr><td>Complément (bis, ter...) :</td><td><input type="text" name="old_complement"></td></tr>
			
			<tr><td>Type de voie (rue, avenue...) :  </td><td><input type="text" name="old_type_rue"></td></tr>
			
			<tr><td>Nom de la voie : </td><td><input type="text" name="old_nom_voie"></td></tr>
			
			<tr><td>Code postal : </td><td><input type="text" name="old_code_postal"></td></tr>
			
			<tr><td>Commune : </td><td><input type="text" name="old_commune"></td></tr>
			
			<tr><td>Je certifie : </td>
			<td><input type="radio" id="ceder" name="ceder" value="ceder">
  				<label for="ceder">Céder</label>
 				<input type="radio" id="ceder_destruction" name="ceder_destruction" value="ceder_destruction">
  				<label for="ceder_destruction">Céder pour destruction</label></td></tr>
			
			<tr><td>Le (JJ/MM/AAAA) : </td><td><input type="date" name="date_cession"></td></tr>
			
			<tr><td>à (HH:MM) : </td><td><input type="time" name="heure_cession"></td></tr>
			
			<tr><td colspan = 2>Je certifie en outre (veuillez cocher la ou les case(s) correspondante(s)) : <br>
				<input type="checkbox" id="checkbox1" name="checkbox1" value="choix1">
  				<label for="checkbox1"> Avoir remis au nouveau propriétaire un certificat établi depuis moins de quinze jours par le ministre de l’Intérieur,<br> attestant à sa date d’édition de la situation administrative du véhicule ;</label><br>
  				<input type="checkbox" id="checkbox2" name="checkbox2" value="choix2">
  				<label for="checkbox2"> Que ce véhicule n’a pas subi de transformation notable susceptible de modifier les indications du certificat de conformité <br> ou de l’actuel certificat d’immatriculation ;</label><br>
  				<input type="checkbox" id="checkbox3" name="checkbox3" value="choix3">
  				<label for="checkbox3"> Que ce véhicule est cédé pour destruction à un professionnel de la destruction des véhicules hors d’usage (VHU).</label></td></tr>

			<tr><td>Fait à : </td><td><input type="text" name="lieu"></td></tr>
			<tr><td>Le (JJ/MM/AAAA) : </td><td><input type="date" name="date_du_jour"></td></tr>
			<tr><td>Je m’oppose à la réutilisation de mes données personnelles à <br> des fins de prospection commerciale : </td>
			<td><input type="radio" id="oui_utilisation" name="oui_utilisation" value="Oui">
  				<label for="oui_utilisation">Oui</label>
 				<input type="radio" id="non_utilisation" name="non_utilisation" value="Non">
  				<label for="non_utilisation">Non</label></td></tr>
				  
			<br>
			<br>
			<tr><td colspan="2"><strong>Information sur le nouveau propriétaire</strong></td></tr>
			<tr><td>Vous êtes ? </td>
				<td><input type="radio" id="oui_new_proprio" name="new_proprio" value="oui">
  				<label for="oui_new_proprio">Oui</label>
 				<input type="radio" id="non_new_proprio" name="new_proprio" value="non">
  				<label for="non_new_proprio">Non</label></td></tr>
			
			<tr><td>N° de la voie :</td><td><input type="text" name="new_numero_voie"></td></tr>
			
			<tr><td>Complément (bis, ter...) :</td><td><input type="text" name="new_complement"></td></tr>
			
			<tr><td>Type de voie (rue, avenue...) :  </td><td><input type="text" name="new_type_rue"></td></tr>
			
			<tr><td>Nom de la voie : </td><td><input type="text" name="new_nom_voie"></td></tr>
			
			<tr><td>Code postal : </td><td><input type="text" name="new_code_postal"></td></tr>
			
			<tr><td>Commune : </td><td><input type="text" name="new_commune"></td></tr>
			
			<tr><td>Je certifie : </td>
			<td><input type="radio" id="ceder" name="ceder" value="ceder">
  				<label for="ceder">Céder</label>
 				<input type="radio" id="ceder_destruction" name="ceder_destruction" value="ceder_destruction">
  				<label for="ceder_destruction">Céder pour destruction</label></td></tr>
			
			<tr><td>Le (JJ/MM/AAAA) : </td><td><input type="date" name="date_cession"></td></tr>
			
			<tr><td>à (HH:MM) : </td><td><input type="time" name="heure_cession"></td></tr>
			
			<tr><td colspan = 2>Certifie (veuillez cocher la ou les case(s) correspondante(s)) : <br>
				<input type="checkbox" id="checkbox1" name="checkbox1" value="choix1">
  				<label for="checkbox1"> Acquérir le véhicule désigné ci-dessus aux dates et heures indiquées par l’ancien propriétaire ;</label><br>
  				<input type="checkbox" id="checkbox2" name="checkbox2" value="choix2">
  				<label for="checkbox2"> Avoir été informé de la situation administrative du véhicule.</label><br></td></tr>

			<tr><td>Fait à : </td><td><input type="text" name="lieu"></td></tr>
			<tr><td>Le (JJ/MM/AAAA) : </td><td><input type="date" name="date_du_jour"></td></tr>
			<tr><td>Je m’oppose à la réutilisation de mes données personnelles à <br> des fins de prospection commerciale : </td>
			<td><input type="radio" id="oui_utilisation" name="oui_utilisation" value="Oui">
  				<label for="oui_utilisation">Oui</label>
 				<input type="radio" id="non_utilisation" name="non_utilisation" value="Non">
  				<label for="non_utilisation">Non</label></td></tr>
			<tr><td colspan = "2"><input type="submit" value ="Valider"></td></tr>
		</table>
	</form>

	</body>
</html>