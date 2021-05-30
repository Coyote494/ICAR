<?php
session_start();

if (!isset($_SESSION["nom"])) {
    header("Location: Accueil.php");
    exit();
}

$tab = explode(" ", $_POST['ok']);
$line = (int)$tab[3];
$path = "../../database/".$_SESSION['assurance']."/demande_changement.csv";
$dataKept = delLine($path, $line);
writeNewCsv($dataKept, $path);
header('Location: changementCoordonees.php');
exit();
	
	function delLine($path, $line){
		if($f = fopen($path, "r")){
			$i = 1;
			$dataKept = array();
			while($ligne = fgetcsv($f)){
				if($i !== $line){
					array_push($data, $ligne);
				}else{
					$nom = $ligne[1];
					$prenom = $ligne[2];
					//on remplace le fichier coordonnees.csv par le fichier temporaire lorsque la demande est confirmée.
					if (($handle = fopen("../../database/logs.csv", "a"))) {	
						date_default_timezone_set('Europe/Paris');
						$donnes = array(date('d-m-y h:i:s'), "Le gestionnaire ".$_SESSION["nom"]." ".$_SESSION["prenom"]." a accepté un changement de coordonnées pour ".$nom." ".$prenom.".");
						fputcsv($handle, $donnes, ',');
						fclose($handle);
					}
					rename("../../database/".$_SESSION['assurance']."/".strtoupper(substr($nom,0,1))."/".$nom."_".$prenom."/coordonnees_tmp.csv", "../../database/".$_SESSION['assurance']."/".strtoupper(substr($nom,0,1))."/".$nom."_".$prenom."/coordonnees.csv");
				}
				$i++;
			}
			fclose($f);
			unlink($f);
			return($dataKept);
		}
	}

	function writeNewCsv($tab, $path){
		if($f = fopen($path, "c+")){
			foreach($tab as $value){
				fputcsv($f, $value);
			}
			fclose($f);
		}
	}
	
?>