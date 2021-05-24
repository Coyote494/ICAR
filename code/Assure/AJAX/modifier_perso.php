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
			<h3>Mes données personnelles</h3>
            <form enctype="multipart/form-data" method="post" action="./AJAX/modifier_coord.php">
			<table>
				<?php
					$path = "../../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
					if (($handle = fopen($path."coordonnees.csv", "r"))) {
						while (($data = fgetcsv($handle, 1000, ","))) {
							echo "<tr><td>Civilité</td><td><select name='civilite' size = '2'required>";
                            if($data[4] == "M."){
                                echo "<option selected>M.</option>";
                                echo "<option>Mme</option>";
                            }else{
                                echo "<option>M.</option>";
                                echo "<option selected>Mme</option>";
                            }
                            echo "</select></tr></td>";
							echo "<tr><td>Prénom</td><td><input type ='text' name ='prenom' value = ".$data[1]." required></tr></td>";
							echo "<tr><td>Nom</td><td><input type ='text' name ='nom' value = ".$data[0]." required></tr></td>";
							echo "<tr><td>Date de naissance</td><td><input type ='date' name ='date' value = ".$data[5]." required></tr></td>";
							echo "<tr><td>Profession</td><td><input type ='text' name ='profession' value = ".$data[6]." required></tr></td>";
						}
						fclose($handle);
					}
				?>
			</table>
            <p>Veuillez importer un justificatif permettant de valider la modification de vos coordonnées personnelles.</p>	
				<p><input type="file" name="fileToUpload" required></p>
				<p><input type="submit" value="Valider"></p>
			</form>
		</div>
	</body>
</html>