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
			
			$tab[0] = $_POST["nom"];
			$tab[1] = $_POST["prenom"];
			$tab[4] = $_POST["civilite"];
			$tab[5] = $_POST["date"];
			$tab[6] = $_POST["profession"];

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
							"0",
							$tab[0],
							$tab[1],
							$tab[4],
							$tab[5],
							$tab[6],
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
					echo " <h3>Mes données personnelles</h3> ";
					echo "<table>";
							$chemin = "../../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
							if (($handle = fopen($chemin."coordonnees_tmp.csv", "r"))) {
								while (($data = fgetcsv($handle, 1000, ","))) {
									echo "<tr><td>Civilité</td><td name = 'civilite'>".$data[4]."</td></tr>";
									echo "<tr><td>Prénom</td><td name = 'prenom'>".$data[1]."</td></tr>";
									echo "<tr><td>Nom</td><td name = 'nom'>".$data[0]."</td></tr>";
									echo "<tr><td>Date de naissance</td><td name = 'date'>".$data[5]."</td></tr>";
									echo "<tr><td>Profession</td><td name = 'profession'>".$data[6]."</td></tr>";
								}
								fclose($handle);
							}
					echo "</table>";
					echo '<button type = "button" onclick="modifier_perso()">Modifier</button>';
					if (($handle = fopen("../../../database/logs.csv", "a"))) {	
			    		date_default_timezone_set('Europe/Paris');
						$donnes = array(date('d-m-y h:i:s'), "L'assuré ".$_SESSION["nom"]." ".$_SESSION["prenom"]." a déclaré un changement de coordonnées.");
						fputcsv($handle, $donnes, ',');
						fclose($handle);
					}
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