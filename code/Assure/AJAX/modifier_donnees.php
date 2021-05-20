<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Modifier données personnelles</title>
		<meta charset="utf-8">
	</head>
	<body>

        <div>
        <h3>Mes coordonnées</h3>
        <p>Un justificatif de domicile est demandé si vous changer d'adresse.</p>
			<table>
				<?php
					$path = "../../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
					if (($handle = fopen($path."coordonnees.csv", "r"))) {
						while (($data = fgetcsv($handle, 1000, ","))) {
							echo "<tr><td>Adresse</td><td><input type = 'text' id='adresse' multiple value ='".$data[7]."'></td></tr>";
							echo "<tr><td>Code postal</td><td><input type = 'text' id='code' value =".$data[8]."></td></tr>"; 
                            echo "<tr><td>Ville</td><td><input type = 'text' id='ville' value =".$data[9]."></td></tr>";                 
                            echo "<tr><td>Téléphone</td><td><input type = 'tel' id='telephone' value =".$data[10]."></td></tr>";
							echo "<tr><td>E-Mail</td><td><input type = 'email' id='mail' value =".$data[11]."></td></tr>";
						}
						fclose($handle);
					}
				?>
			</table>
			<button type = "button" onclick="valider_donnees()">Valider</button>
        </div>
	</body>
</html>