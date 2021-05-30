<?php
session_start();
if (!isset($_SESSION["nom"])) {
    header("Location: Accueil.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Signaler un problème</title>
	</head>
	<body>
		<?php
			if (($handle = fopen("../../database/problemes.csv", "a"))) {	
				date_default_timezone_set('Europe/Paris');
	    		$data = array(date('d-m-y h:i:s'),$_SESSION["nom"]." ".$_SESSION["prenom"],$_POST["probleme"]);
	    		fputcsv($handle, $data, ',');
	    		fclose($handle);
			}
			if (($handle = fopen("../../database/logs.csv", "a"))) {	
	    		date_default_timezone_set('Europe/Paris');
				$donnes = array(date('d-m-y h:i:s'), "Le gestionnaire ".$_SESSION["nom"]." ".$_SESSION["prenom"]." a ajouté une nouvelle erreur.");
				fputcsv($handle, $donnes, ',');
				fclose($handle);
			} 
<<<<<<< HEAD
		?>			<!-- bouton de déconnexion -->
	<form method="POST" action="../deconnexion.php">
		<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
	</form>
=======
		?>
		<?php
			header('Location: gestionnaire.php');
		?>
>>>>>>> ca739a752ba6e2155987376cdd692101f8255ea8
	</body>
</html>