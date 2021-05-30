<?php
session_start();
if (!isset($_SESSION["nom"])) {
    header("Location: Accueil.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Ajout assurance</title>
		<meta charset="utf-8">
	</head>

	<body>

	<div class="bandeau"> 
		<img src="../img/logo.png">
        <h2>Bienvenue sur votre page administrateur</h2>
    </div>

    <div class="voiture-rtl">
        <div><img src="img/voiture.png"></div>
    </div>

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
			$path = "../../database/".$_POST["nomAssurance"]."/";
			mkdir($path);
			if (($handle = fopen("../../database/identifiant_gestionnaires.csv", 'a'))) {
				$mdp = getRandomString(10);
				$data = array($_POST["nom"], $_POST["prenom"], $_POST["mail"], $mdp, $_POST["nomAssurance"]);
				fputcsv($handle, $data, ',');
				fclose($handle);
			}
			if (($handle = fopen("../../database/logs.csv", "a"))) {	
	    		date_default_timezone_set('Europe/Paris');
				$donnes = array(date('d-m-y h:i:s'), "L'administrateur ".$_SESSION["nom"]." ".$_SESSION["prenom"]." a ajouté l'assurance ".$_POST["nomAssurance"]." avec comme gestionnaire ".$_POST["nom"]." ".$_POST["prenom"].".");
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