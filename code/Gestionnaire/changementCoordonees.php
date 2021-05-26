<!DOCTYPE html>
<html>
	<head>
		<title>Changement de coordonées</title>	
	</head>
	<body>
		<h1>Demandes De Changement de Coordonées :</h1>
		<?php
		
		displayRequest();

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
		
		
		function displayRequest(){
			$new = fopen("../../database/".$_SESSION['assurance'].."demande_changement.csv", "a+");
			while(($new_content = fgetcsv($new)) !== FALSE){
				if($new_content[0] == 0){
					echo "<p>demande de changement de données</p>";
					$old = fopen("../../database/".$_SESSION['assurance']."/".strtoupper(substr($new_content[1],0,1)."/".$new_content[1]."_".$new_content[2]."coordonnees.csv", "r");
					$old_content = fgetcsv($old);
				  	echo "<p>Nom :".$old_content[0]."</p><br><p>Prénom :".$old_content[1]]."</p><br><p>Civilité :".$old_content[4]."</p><br><p>Date de naissance :".$old_content[5]."</p><br><p>Profession :".$old_content[6]."</p><br>";
					echo "<p>Nom :".$new_content[1]."</p><br><p>Prénom :".$new_content[2]."</p><br><p>Civilité :".$new_content[3]."</p><br><p>Date de naissance :".$new_content[4]."</p><br><p>Profession :".$new_content[5]."</p><br>";
					ScanDirectory($new_content[6]);
					echo "<input action='.php' type='submit' value='confirmer la demande'>";
					fclose($old);
				}else{
					echo "<p>Demande de changement de coordonnées</p>";
					$old = fopen("../../database/".$_SESSION['assurance']."/".strtoupper(substr($new_content[1],0,1)."/".$new_content[6]."_".$new_content[7]."coordonnees.csv", "r");
					$old_content = fgetcsv($old);
					echo "<p>Adresse :".$old_content[7]."</p><br><p>Code Postal :".$old_content[8]."</p><br><p>Ville :".$old_content[9]."</p><br><p>Téléphone :".$old_content[10]."</p><br><p>Email :".$old_content[11]."</p><br>";
					echo "<p>Adresse :".$new_content[1]."</p><br><p>Code Postal :".$new_content[2]."</p><br><p>Ville :".$new_content[3]."</p><br><p>Téléphone :".$new_content[4]."</p><br><p>Email :".$new_content[5]."</p><br>";
					ScanDirectory($new_content[8]);
					echo "<input action='.php' type='submit' value='confirmer la demande'>";
					fclose($old);
				}
			}
			fclose($new);
		}
		
		?>
	</body>
</html>