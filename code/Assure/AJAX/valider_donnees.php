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
		    $chemin = "../../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
			if (($handle = fopen("../".$chemin.'/coordonnees.csv', 'r'))) {
				$tab = fgetcsv($handle, 1000, ",");
                fclose($handle);
			}
			$tab[7] = $_POST["adresse"];
			$tab[8] = $_POST["code"];
			$tab[9] = $_POST["ville"];
			$tab[10] = $_POST["telephone"];
			$tab[11] = $_POST["mail"];

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
			$valeur = $tab[7].";".$tab[8].";".$tab[9].";".$tab[10].";".$tab[11].";".$chemin."Documents/justificatif".$i.".pdf";
			setcookie("modif_adresse", $valeur, $secure = false, $expire = time()+60*60*24*30, $httponly = false, $path = "/icar/code/Gestionnaire");
			if (($handle = fopen("../".$chemin.'/coordonnees_tmp.csv', 'w'))) {
				fputcsv($handle, $tab, ",");
				fclose($handle);
			}
		?>
        <h3>Mes coordonnées</h3>
		<table>
			<?php
				$chemin = "../../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
				if (($handle = fopen("../".$chemin."coordonnees_tmp.csv", "r"))) {
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
			<p><input type="file" name="fileToUpload" accept = ".pdf"></p>
			<p><input type="submit" value="Importer"></p>
		</form>
	</body>
</html>