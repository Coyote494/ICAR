<?php
session_start();

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
					if (($handle = fopen("../../database/logs.csv", "a"))) {	
						date_default_timezone_set('Europe/Paris');
						$donnes = array(date('d-m-y h:i:s'), "Le gestionnaire ".$_SESSION["nom"]." ".$_SESSION["prenom"]." a refusé un changement de coordonnées pour ".$nom." ".$prenom.".");
						fputcsv($handle, $donnes, ',');
						fclose($handle);
					}
					//on supprime le fichier coordonnees_tmp.csv lorsque la demande est refusée.
					unlink("../../database/".$_SESSION['assurance']."/".strtoupper(substr($nom,0,1))."/".$nom."_".$prenom."/coordonnees_tmp.csv");
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