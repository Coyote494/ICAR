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
							echo '<p>Le client '.$line[0].' '.$line[1].' à vendu sa voiture</p><br>'
							echo "<p>Justificatif: </p><br>"
							ScanDirectory($chemin);
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