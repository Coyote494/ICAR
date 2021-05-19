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

        <?php
		    $path = "../../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
			if (($handle = fopen($path.'/coordonnees.csv', 'r'))) {
				$tab = fgetcsv($handle, 1000, ",");
                fclose($handle);
			}
			$tab[0] = $_POST["nom"];
			$tab[1] = $_POST["prenom"];
			$tab[4] = $_POST["civilite"];
			$tab[5] = $_POST["date"];
			$tab[6] = $_POST["profession"];
			if (($handle = fopen($path.'/coordonnees.csv', 'w'))) {
				fputcsv($handle, $tab, ",");
				fclose($handle);
			}
		?>
        <h3>Mes données personnelles</h3>
		<table>
			<?php
				$path = "../../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
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

		<p>Veuillez importer un justificatif permettant de valider la modification de vos données personnelles.</p>	
        <form enctype="multipart/form-data" method="post" action="./gestion_upload/justificatif_coord.php">
			<p><input type="file" name="fileToUpload"></p>
			<p><input type="submit" value="Importer"></p>
		</form>
	</body>
</html>