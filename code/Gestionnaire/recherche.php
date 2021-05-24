<?php
$first = strtoupper(substr($nom,0,1));

//strtolower partout??
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$tel = $_POST["tel"];
$email = $_POST["email"];
$numero = $_POST["numero"];

$path = "../database/".$_SESSION['assurance']."/".$first."/".$nom."_".$prenom."/";
displayInfo($path);
ScanDirectory($path."/Contrats");
ScanDirectory($path."/Sinistres");
ScanDirectory($path."/Documents");


	function displayInfo($path){
		$f = fopen($path."coordonnees.csv", "r");
		$info = fgetcsv($f);
		echo "<p>Nom: ".$info[0]."</p><br><p>Prénom: ".$info[1]."</p><br><p>Adresse: ".$info[4]."</p><br><p>Code Postal: ".$info[5]."</p><br><p>Ville: ".$info[6]."</p><br><p>Portable: ".$info[7]."</p><br><p>Email: ".$info[8]."</p><br>";
		fclose($f);
	}
	
	
	function ScanDirectory($Directory){

		$MyDirectory = opendir($Directory) or die('Erreur');
		while(false != ($Entry = readdir($MyDirectory))) {
			if(is_dir($Directory.'/'.$Entry)&& $Entry != '.' && $Entry != '..') {
			    echo '<div>'.$Entry;
			   	ScanDirectory($Directory.'/'.$Entry);
			    echo '</div>';
			}
			else if($Entry != '.' && $Entry != '..'){
				echo '<li><a href ='.$Directory.'/'.$Entry.' target="_blank">'.$Entry.'</a></li>';
			}
		}
		closedir($MyDirectory);
	}
	
	
?>