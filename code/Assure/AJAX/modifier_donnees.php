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
			<form enctype="multipart/form-data" method="post" action="./AJAX/valider_donnees.php">	
				<table>
					<?php
						$path = "../../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
						if (($handle = fopen($path."coordonnees.csv", "r"))) {
							while (($data = fgetcsv($handle, 1000, ","))) {
								echo "<tr><td>Adresse</td><td><input type = 'text' name='adresse' multiple value ='".$data[7]."' required></td></tr>";
								echo "<tr><td>Code postal</td><td><input type = 'text' name='code' value =".$data[8]." required></td></tr>"; 
								echo "<tr><td>Ville</td><td><input type = 'text' name='ville' value =".$data[9]." required></td></tr>";                 
								echo "<tr><td>Téléphone</td><td><input type = 'tel' name='telephone' value =".$data[10]." required></td></tr>";
								echo "<tr><td>E-Mail</td><td><input type = 'email' name='mail' value =".$data[11]." required></td></tr>";
							}
							fclose($handle);
						}
					?>
				</table>

				<p>Veuillez importer un justificatif permettant de valider la modification de vos données personnelles.</p>	
				<p><input type="file" name="fileToUpload" required></p>
				<p><input type="submit" value="Valider"></p>
			</form>
        </div>
	</body>
</html>