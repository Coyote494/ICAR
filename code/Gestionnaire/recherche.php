<?php
session_start();
if (!isset($_SESSION["nom"])) {
    header("Location: Accueil.php");
    exit();
}

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$tel = $_POST["tel"];
$numero = $_POST["numero"];
$email = $_POST["email"];

$path = "../../database/".$_SESSION['assurance']."/";
$verif = True;
if($handle = fopen($path."liste_clients.csv", "r")){
	while($data = fgetcsv($handle, 1000, ',') and $verif == True){
		if( ($data[0] == $nom && $data[1] == $prenom) || $data[4] == $tel || $data[5] == $email || $data[6] == $numero){
			$nom = $data[0];
			$prenom = $data[1];
			$tel = $data[4];
			$email = $data[5];
			$numero = $data[6];
			$verif = False;
		}
	}	
	fclose($handle);
}

$first = strtoupper(substr($nom,0,1));
$path =$path.$first."/".$nom."_".$prenom."/";

if($verif == False){
	displayInfo($path);
	ScanDirectory($path."Contrats");
	ScanDirectory($path."Sinistres");
	ScanDirectory($path."Documents");
	ScanDirectory($path."Justificatifs");
}else{
	echo "Aucun contrat trouvé avec les informations fournies.";
}


	function displayInfo($path){
		if($f = fopen($path."coordonnees.csv", "r")){
			$info = fgetcsv($f);
			echo "<p>Nom: ".$info[0]."</p><br><p>Prénom: ".$info[1]."</p><br><p>Adresse: ".$info[4]."</p><br><p>Code Postal: ".$info[5]."</p><br><p>Ville: ".$info[6]."</p><br><p>Portable: ".$info[7]."</p><br><p>Email: ".$info[8]."</p><br>";
			fclose($f);
		}
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