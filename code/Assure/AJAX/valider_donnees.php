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
		    $chemin = "../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
			if(file_exists("../".$chemin.'/coordonnees_tmp.csv')){
				if (($handle = fopen("../".$chemin.'/coordonnees_tmp.csv', 'r'))) {
					$tab = fgetcsv($handle, 1000, ",");
					fclose($handle);
				}
			}else{
				if (($handle = fopen("../".$chemin.'/coordonnees.csv', 'r'))) {
					$tab = fgetcsv($handle, 1000, ",");
					fclose($handle);
				}
			}
			
			$tab[7] = $_POST["adresse"];
			$tab[8] = $_POST["code"];
			$tab[9] = $_POST["ville"];
			$tab[10] = $_POST["telephone"];
			$tab[11] = $_POST["mail"];

			$path = "../../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/Justificatifs/";
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
					$valeur = array(
							"1",
							$tab[7],
							$tab[8],
							$tab[9],
							$tab[10],
							$tab[11],
							$chemin."Justificatifs/justificatif".$i.".".$extension[$n-1]
						);
			
					if (($handle = fopen("../".$chemin.'coordonnees_tmp.csv', 'w'))) {
						fputcsv($handle, $tab, ",");
						fclose($handle);
					}
					if (($handle = fopen("../../../database/".$_SESSION["assurance"]."/demande_changement.csv", 'a'))) {
						fputcsv($handle, $valeur, ",");
						fclose($handle);
					}
					echo "<h3>Mes coordonnées</h3>";
					echo "<table>";
					$chemin = "../../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
					if (($handle = fopen($chemin."coordonnees_tmp.csv", "r"))) {
						while (($data = fgetcsv($handle, 1000, ","))) {
							echo "<tr><td>Adresse</td><td>".$data[7].",</br>".$data[8]." ".$data[9]."</td></tr>";
							echo "<tr><td>Téléphone</td><td>".$data[10]."</td></tr>";
							echo "<tr><td>E-Mail</td><td>".$data[11]."</td></tr>";
						}
						fclose($handle);
					}
					echo "</table>";
					echo '<button type = "button" onclick="modifier_donnees()">Modifier</button>';
					header('Location: ../changement_coord.php?upload=sucess');
			  		exit();
			  	}else{
                	header('Location: ../changement_coord.php?upload=echec');
			  		exit();
			  	}
			}
			?>
    	</body>
</html>