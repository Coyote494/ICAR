<!-- on ouvre une nouvelle session -->
<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Verification Connexion</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
            $nom = $_GET["nom"];
            $prenom = $_GET["prenom"];
            $assurance	= $_GET["assurance"];
            $path = "../database/";
			if (($handle = fopen($path."identifiant_admin.csv", "r"))) {			//on ouvre le fichier identifiant et on vérifie si il est ouvert
				while (($data = fgetcsv($handle, 1000, ","))) {		//on récupere les lignes du fichier
				    if($data[2] == $_POST["id"] && $data[3] == $_POST["mdp"]){    //si le couple pseudo/mdp existe on redirige vers l'accueil
				    	$_SESSION["nom"] = $data[0];
				    	$_SESSION["prenom"] = $data[1];
				    	$_SESSION["rang"] = "administrateur";
				    	fclose($handle);
				    	header('Location: ../Admin/admin.php');
				    	exit();
				    }
				}
			}else if (($handle = fopen($path."identifiant_force_ordre.csv", "r"))) {			//on ouvre le fichier identifiant et on vérifie si il est ouvert
				while (($data = fgetcsv($handle, 1000, ","))) {		//on récupere les lignes du fichier
				    if($data[2] == $_POST["id"] && $data[3] == $_POST["mdp"]){    //si le couple pseudo/mdp existe on redirige vers l'accueil
				    	$_SESSION["nom"] = $data[0];
				    	$_SESSION["prenom"] = $data[1];
				    	$_SESSION["rang"] = "force_ordre";
				    	fclose($handle);
				    	header('Location: ../Force_de_l_ordre/accueil_force_ordre.php?nom='.$nom.'&prenom='.$prenom.'&assurance='.$assurance);
				    	exit();
				    }
				}
            }else if (($handle = fopen($path."identifiant_gestionnaires.csv", "r"))) {			//on ouvre le fichier identifiant et on vérifie si il est ouvert
				while (($data = fgetcsv($handle, 1000, ","))) {		//on récupere les lignes du fichier
				    if($data[2] == $_POST["id"] && $data[3] == $_POST["mdp"]){    //si le couple pseudo/mdp existe on redirige vers l'accueil
				    	$_SESSION["nom"] = $data[0];
				    	$_SESSION["prenom"] = $data[1];
				    	$_SESSION["rang"] = "gestionnaire";
                        $_SESSION["assurance"] = $data[4];
				    	fclose($handle);
				    	header('Location: ../Gestionnaire/gestionnaire.php');
				    	exit();
				    }
				}
			}else{
				$Directory = "../database";
				$MyDirectory = opendir($Directory) or die('Erreur');
			 	while(false != ($Entry = readdir($MyDirectory))) {
			 		if(is_dir($Directory.'/'.$Entry)&& $Entry != '.' && $Entry != '..') {
			      		if (($handle = fopen($path."identifiant_gestionnaires.csv", "r"))) {			//on ouvre le fichier identifiant et on vérifie si il est ouvert
							while (($data = fgetcsv($handle, 1000, ","))) {		//on récupere les lignes du fichier
							    if($data[2] == $_POST["id"] && $data[3] == $_POST["mdp"]){    //si le couple pseudo/mdp existe on redirige vers l'accueil
							    	$_SESSION["nom"] = $data[0];
							    	$_SESSION["prenom"] = $data[1];
							    	$_SESSION["rang"] = "assure";
			                        $_SESSION["assurance"] = $Entry;
							    	fclose($handle);
							    	header('Location: ../Assure/accueil_assure.php');
							    	exit();
							    }
							}
						}
			  		}
			 	}
			  	closedir($MyDirectory);
			}
			header('Location: ../Gestion/connexion.php?erreur=mdp');			//cas où le pseudo/mdp est erroné.
			exit();
		?>
	</body>
</html>