<?php
session_start();
if (!isset($_SESSION["nom"])) {
    header("Location: ../Accueil.php");
    exit();
}

principal();

	function principal(){
		rrmdir($_POST['dir']);
		$tab = explode($_POST['dir'], '_');
		LOGS($tab);
		header('Location: supprimerContrat.php');
		exit();
	}
	
	function LOGS($line){
		if (($handle = fopen("../../database/logs.csv", "a"))){	
			date_default_timezone_set('Europe/Paris');
			$donnes = array(date('d-m-y h:i:s'), "Le gestionnaire ".$_SESSION["nom"]." ".$_SESSION["prenom"]." a supprimé la session de ".$line[0]." ".$line[1].". Cause : cession de vehicule.");
			fputcsv($handle, $donnes, ',');
			fclose($handle);
		}	
	}

	function rrmdir($src) {
		$dir = opendir($src);
		while(false !== ( $file = readdir($dir)) ) {
			if (( $file != '.' ) && ( $file != '..' )) {
				$full = $src . '/' . $file;
				if ( is_dir($full) ) {
					rrmdir($full);
				}
				else {
					unlink($full);
				}
			}
		}
		closedir($dir);
		rmdir($src);
	}
?>