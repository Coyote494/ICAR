<?php
session_start();
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
				$donnes = array(date('d-m-y h:i:s'), "L'assuré ".$_SESSION["nom"]." ".$_SESSION["prenom"]." a ajouté une nouvelle erreur.");
				fputcsv($handle, $donnes, ',');
				fclose($handle);
			} 
		?>
	</body>
</html>