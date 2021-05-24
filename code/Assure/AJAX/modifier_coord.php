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
		    $chemin = "../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
			if (($handle = fopen("../".$chemin.'/coordonnees.csv', 'r'))) {
				$tab = fgetcsv($handle, 1000, ",");
                fclose($handle);
			}
			$tab[0] = $_POST["nom"];
			$tab[1] = $_POST["prenom"];
			$tab[4] = $_POST["civilite"];
			$tab[5] = $_POST["date"];
			$tab[6] = $_POST["profession"];
			$i = 0;
            $verif = 1;
            //comme on peut ajouter plusieurs images/témoignages il faut tous les garder en mémoire
            while($verif){
            	if(file_exists("../".$chemin."Documents/justificatif".$i.".pdf")){
            		$i++;
            	}else{
            		$verif = 0;
            	}
            }
			$valeur = $tab[0].";".$tab[1].";".$tab[4].";".$tab[5].";".$tab[6].";".$chemin."Documents/justificatif".$i.".pdf";
			setcookie("modif_donnees", $valeur, $secure = false, $expire = time()+60*60*24*30, $httponly = false, $path = "/icar/code/Gestionnaire");
			if (($handle = fopen("../".$chemin.'coordonnees_tmp.csv', 'w'))) {
				fputcsv($handle, $tab, ",");
				fclose($handle);
			}
		?>
        <h3>Mes données personnelles</h3>
		<table>
			<?php
				$chemin = "../../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
				if (($handle = fopen("../".$chemin."coordonnees_tmp.csv", "r"))) {
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
			<p><input type="file" name="fileToUpload" accept = ".pdf"></p>
			<p><input type="submit" value="Importer"></p>
		</form>
	</body>
</html>