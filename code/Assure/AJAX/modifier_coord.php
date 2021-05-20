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
		    $chemin = "../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
			if (($handle = fopen("../".$chemin.'/coordonnees.csv', 'r'))) {
				$tab = fgetcsv($handle, 1000, ",");
                fclose($handle);
			}
			$tab[0] = $_POST["nom"];
			$tab[1] = $_POST["prenom"];
			$tab[4] = $_POST["civilite"];
			$tab[5] = $_POST["date"];
			$tab[6] = $_POST["profession"];

			$path = "../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/Documents/";
            //on vérifie s'il y a des erreurs d'upload
			if ($_FILES['fileToUpload']['error']  > 0 ) {
				header('Location: ../changement_coord.php?upload=echec');
			  	exit();
			} else{
                //on déplace le fichier uploadé des fichiers temporaires dans son dossier de stockage
                // et on vérifie que l'opéation s'est bien passé
				$extension = explode('.', $_FILES['fileToUpload']['name']) ; //on enregistre le fichier sous la bonne extension
                $n = count($extension);
                $i = 0;
                $verif = 1;
                //comme on peut ajouter plusieurs justificatifs il faut tous les garder en mémoire
                while($verif){
                	if(file_exists($path."justificatif".$i.".".$extension[$n-1])){
                		$i++;
                	}else{
                		$verif = 0;
                	}
                }
			  	$res = move_uploaded_file( 
			        $_FILES['fileToUpload']['tmp_name'], 
			        $path."justificatif".$i.".".$extension[$n-1]);
			  	if($res){
                    header('Location: ../changement_coord.php?upload=sucess');
			  		exit();
			  	}else{
                    header('Location: ../changement_coord.php?upload=echec');
			  		exit();
			  	}
			}

			$valeur = $tab[0].";".$tab[1].";".$tab[4].";".$tab[5].";".$tab[6].";".$chemin."Documents/justificatif".$i.".pdf";
			if (($handle = fopen("../".$chemin.'coordonnees_tmp.csv', 'w'))) {
				fputcsv($handle, $tab, ",");
				fclose($handle);
			}

			if (($handle = fopen("../../../database/".$_SESSION["assurance"], 'w'))) {
				fputcsv($handle, $tab, ",");
				fclose($handle);
			}
		?>
        <h3>Mes données personnelles</h3>
		<table>
			<?php
				$chemin = "../../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
				if (($handle = fopen($chemin."coordonnees_tmp.csv", "r"))) {
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
	</body>
</html>