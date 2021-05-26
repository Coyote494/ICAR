<?php
$tab = explode(" ", $_POST['ok']);
$line = (int)$tab[3];
$path = "../../database/".$_SESSION['assurance']."/demande_changement.csv";
$dataKept = delLine($path, $line);
writeNewCsv($dataKept, $path);

	function delLine($path, $line){
		$f = fopen($path, "r");
		$i = 1;
		$dataKept = array();
		while($ligne = fgetcsv($f)){
			if($i !== $line){
				array_push($data, $ligne);
			}else{
				$nom = $ligne[1];
				$prenom = $ligne[2];
				//on remplace le fichier coordonnees.csv par le fichier temporaire lorsque la demande est confirmée.
				rename("../../database/".$_SESSION['assurance']."/".strtoupper(substr($nom,0,1))."/".$nom."_".$prenom."/coordonnees_tmp.csv", "../../database/".$_SESSION['assurance']."/".strtoupper(substr($nom,0,1))."/".$nom."_".$prenom."/coordonnees.csv");
			}
			$i++;
		}
		fclose($f);
		unlink($f);
		return($dataKept);
	}

	function writeNewCsv($tab, $path){
		$f = fopen($path, "c+");
		foreach($tab as $value){
			fputcsv($f, $value);
		}
		fclose($f);
	}
	
?>