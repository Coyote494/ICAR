<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Ajout assurance</title>
		<link rel="stylesheet" type="text/css" href="./CSS/historique_sinistre.css" />
		<meta charset="utf-8">
	</head>
	<body>
		<?php
		function getRandomString($n) {
		    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $randomString = '';
		    for ($i = 0; $i < $n; $i++) {
		        $index = rand(0, strlen($characters) - 1);
		        $randomString .= $characters[$index];
		    } 
		    return $randomString;
		}
			$path = "../../database/".$_POST["assurance"]."/";
			if (($handle = fopen("../../database/identifiant_gestionnaires.csv", 'a'))) {
				$mdp = getRandomString(10);
				$data = array($_POST["nom"], $_POST["prenom"], $_POST["mail"], $mdp, $_POST["assurance"]);
				fputcsv($handle, $data, ',');
				fclose($handle);
			}
			if (($handle = fopen("../../database/logs.csv", "a"))) {	
	    		date_default_timezone_set('Europe/Paris');
				$donnes = array(date('d-m-y h:i:s'), "L'administrateur ".$_SESSION["nom"]." ".$_SESSION["prenom"]." à ajouté le gestionnaire ".$_POST["nom"]." ".$_POST["prenom"]." à l'assurance ".$_POST["assurance"].".");
				fputcsv($handle, $donnes, ',');
				fclose($handle);
			} 
			header('Location: admin.php');
		?>
	</body>
</html>