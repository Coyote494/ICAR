<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Modifier coordonnées</title>
		<meta charset="utf-8">
	</head>
	<body>

        <?php
		    $path = "../../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
			if (($handle = fopen($path.'/coordonnees.csv', 'r'))) {
				$tab = fgetcsv($handle, 1000, ",");
                fclose($handle);
			}
			$tab[7] = $_POST["adresse"];
			$tab[8] = $_POST["code"];
			$tab[9] = $_POST["ville"];
			$tab[10] = $_POST["telephone"];
			$tab[11] = $_POST["mail"];
			if (($handle = fopen($path.'/coordonnees.csv', 'w'))) {
				fputcsv($handle, $tab, ",");
				fclose($handle);
			}
		?>
        <h3>Mes coordonnées</h3>
		<table>
			<?php
				$path = "../../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
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

		<p>Veuillez importer un justificatif permettant de valider la modification de vos coordonnées personnelles.</p>	
        <form enctype="multipart/form-data" method="post" action="./gestion_upload/justificatif_coord.php">
			<p><input type="file" name="fileToUpload"></p>
			<p><input type="submit" value="Importer"></p>
		</form>
	</body>
</html>