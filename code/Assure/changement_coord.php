<?php
	session_start();
	$_SESSION["nom"] = "Hubert";
	$_SESSION["prenom"] = "Lucas";
	$_SESSION["assurance"] = "Allianz";
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Déclaration de changement de coordonnées</title>
		<meta charset="utf-8">
	</head>
	<body>

		<!-- bouton de déconnexion -->
		<form method="POST" action="deconnexion.php">
			<input type="submit" name="OUT" value="Déconnexion"/>
		</form>

        <h2>Déclarer un changement de coordonnées</h2>

		<div id="coord_perso">
			<h3>Mes données personnelles</h3>
			<table>
				<?php
					$path = "../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
					if (($handle = fopen($path."coordonnees.csv", "r"))) {
						while (($data = fgetcsv($handle, 1000, ","))) {
							echo "<tr><td>Civilité</td><td id = 'civilite'>".$data[4]."</td></tr>";
							echo "<tr><td>Prénom</td><td id = 'prenom'>".$data[1]."</td></tr>";
							echo "<tr><td>Nom</td><td id = 'nom'>".$data[0]."</td></tr>";
							echo "<tr><td>Date de naissance</td><td id = 'date'>".$data[5]."</td></tr>";
							echo "<tr><td>Profession</td><td id = 'profession'>".$data[6]."</td></tr>";
						}
						fclose($handle);
					}
				?>
			</table>
			<button type = "button" onclick="modifier_perso()">Modifier</button>
		</div>

		<div id="donnees">
			<h3>Mes coordonnées</h3>
			<table>
				<?php
					$path = "../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
					if (($handle = fopen($path."coordonnees.csv", "r"))) {
						while (($data = fgetcsv($handle, 1000, ","))) {
							echo "<tr><td>Adresse</td><td>".$data[7].",</br>".$data[8]." ".$data[9]."</td></tr>";
							echo "<tr><td>Téléphone</td><td>".$data[10]."</td></tr>";
							echo "<tr><td>E-Mail</td><td>".$data[11]."</td></tr>";
						}
						fclose($handle);
					}
				?>
			</table>
			<button type = "button" onclick="modifier_donnees()">Modifier</button>
		</div>

		<div>
			<h3>Mes Informations de Connexion</h3>
			<table>
				<?php
					$path = "../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
					if (($handle = fopen($path."coordonnees.csv", "r"))) {
						while (($data = fgetcsv($handle, 1000, ","))) {
							echo "<tr><td>Identifiant</td><td>".$data[2]."</td></tr>";
							echo "<tr><td>Mot de passe</td><td>******</td><td>";
							echo '<form action="modifierMDP.php"><input type="submit" value="Modifier mot de passe"></form></td></tr>';
						}
						fclose($handle);
					}
				?>
			</table>
		</div>
		<script type="text/javascript" src="/icar/Assure/JS/modifier_perso.js"></script>
	</body>
</html>