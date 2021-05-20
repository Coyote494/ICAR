<!-- on ouvre une nouvelle session -->
<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Mot de passe</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
            $path = "../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
            if (($handle = fopen($path."coordonnees.csv", 'r'))) {
                $tab = fgetcsv($handle, 1000, ",");
                if($_POST["old_mdp"] != $tab[3]){
                    header('Location: modifierMDP.php?erreur=2');
                    exit();
                }
            }
			if($_POST["mdp"] == $_POST["mdp2"]){
				if (($handle = fopen($path."coordonnees.csv", 'r'))) {
                    $tab = fgetcsv($handle, 1000, ",");
                }
                $tab[3] = $_POST["mdp"];
				if (($handle = fopen($path."coordonnees.csv", 'w'))) {
					fputcsv($handle, $tab, ",");
					fclose($handle);
					header('Location: ./accueil_assure.php?change_mdp=success');
					exit();
				}				
			}else{
				header('Location: ./modifierMDP.php?erreur=1');
				exit();
			}
		?>
	</body>
</html>