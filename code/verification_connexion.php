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
				    	header('Location: ../Force_de_l_ordre/accueil_force_ordre.php');
				    	exit();
				    }
				}
			}else if (($handle = fopen($path."identifiant_gestionnaires.csv", "r"))) {			//on ouvre le fichier identifiant et on vérifie si il est ouvert
				while (($data = fgetcsv($handle, 1000, ","))) {		//on récupere les lignes du fichier
				    if($data[2] == $_POST["id"] && $data[3] == $_POST["mdp"]){    //si le couple pseudo/mdp existe on redirige vers l'accueil
				    	$_SESSION["nom"] = $data[0];
				    	$_SESSION["prenom"] = $data[1];
				    	$_SESSION["rang"] = "force_ordre";
                        $_SESSION["assurance"] = "gestionnaire";
				    	fclose($handle);
				    	header('Location: ../Gestionnaire/gestionnaire.php');
				    	exit();
				    }
				}
			}
			header('Location: ../Gestion/connexion.php?erreur=mdp');			//cas où le pseudo/mdp est erroné.
		?>
	</body>
</html>
