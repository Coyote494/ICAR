<?php
session_start();
if (!isset($_SESSION["nom"])) {
    header("Location: ../Accueil.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Ajout force de l'ordre</title>
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
			$path = "../../database/";
			if (($handle = fopen("../../database/identifiant_force_ordre.csv", 'a'))) {
				$mdp = getRandomString(10);
				$data = array($_POST["nom"], $_POST["prenom"], $_POST["mail"], $mdp);
				fputcsv($handle, $data, ',');
				fclose($handle);
			}
			if (($handle = fopen("../../database/logs.csv", "a"))) {	
	    		date_default_timezone_set('Europe/Paris');
				$donnes = array(date('d-m-y h:i:s'), "L'administrateur ".$_SESSION["nom"]." ".$_SESSION["prenom"]." à ajouté la force de l'ordre ".$_POST["nom"]." ".$_POST["prenom"].".");
				fputcsv($handle, $donnes, ',');
				fclose($handle);
			} 
			mail($_POST["mail"], "Bienvenue sur Icar", "Votre mot de passe est le suivant : ".$mdp);
			header('Location: admin.php');
		?>
			<!-- bouton de déconnexion -->
	<form method="POST" action="../deconnexion.php">
		<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
	</form>
	</body>
</html>