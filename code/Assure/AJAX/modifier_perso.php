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
            <p>Un justificatif vous sera demander afin de valider la modification de vos coordonnées personnelles.</p>
			<table>
				<?php
					$path = "../../client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
					if (($handle = fopen($path."coordonnees.csv", "r"))) {
						while (($data = fgetcsv($handle, 1000, ","))) {
							echo "<tr><td>Civilité</td><td><select id='civilite' size = '2'>";
                            if($data[4] == "M."){
                                echo "<option selected>M.</option>";
                                echo "<option>Mme</option>";
                            }else{
                                echo "<option>M.</option>";
                                echo "<option selected>Mme</option>";
                            }
                            echo "</select></tr></td>";
							echo "<tr><td>Prénom</td><td><input type ='text' id ='prenom' value = ".$data[1]."></tr></td>";
							echo "<tr><td>Nom</td><td><input type ='text' id ='nom' value = ".$data[0]."></tr></td>";
							echo "<tr><td>Date de naissance</td><td><input type ='date' id ='date' value = ".$data[5]."></tr></td>";
							echo "<tr><td>Profession</td><td><input type ='text' id ='profession' value = ".$data[6]."></tr></td>";
						}
						fclose($handle);
					}
				?>
			</table>
            <?php
                echo "<button type = 'button' onclick = 'modifier_coord()'>Valider</button>";
            ?>
		</div>
	</body>
</html>