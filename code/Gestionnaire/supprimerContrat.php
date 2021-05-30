<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Vente de véhicule</title>
	</head>
	<body>
		<?php
		$path = '../../database/'.$_SESSION['assurance'].'/';
		
			function listSells($path){
				if($f = fopen($path.'/liste_clients.csv', 'r')){
					while($line = fgetcsv($f)){
						//chemin qui mêne au certificat de cession
						$chemin = $path.strtoupper(substr($line[0],0,1)).'/'.$line[0].'_'.$line[1].'/Documents/Cession/'
						if(count(scandir($chemin)) == 2 ){
							echo '<p>Le client '.$line[0].' '.$line[1].' a vendu sa voiture</p><br>'
							echo "<p>Justificatif: </p><br>"
							ScanDirectory($chemin);
							if (($handle = fopen("../../database/logs.csv", "a"))) {	
								date_default_timezone_set('Europe/Paris');
								$donnes = array(date('d-m-y h:i:s'), "Le gestionnaire ".$_SESSION["nom"]." ".$_SESSION["prenom"]." a refusé un changement de coordonnées pour ".$line[0]." ".$line[1].".");
								fputcsv($handle, $donnes, ',');
								fclose($handle);
							}
							echo "<form action='supprimer.php' method='POST'><br><input type='text' name='dir' value="$line[0]."_".$line[1]"><br><input type='submit' name='end' value='mettre fin au contrat'><br></form><br>";
						}
					}
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
		
	</body>
</html>