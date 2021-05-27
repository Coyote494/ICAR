<!DOCTYPE html>
<html>
	<head>
		<title>Changement de coordonées</title>	
			<link rel="stylesheet" type="text/css" href="./CSS/changementCoordonnees.css" />
			<link rel="stylesheet"type="text/css"  href="./CSS/style.php"  />
	</head>
	<body>
	<div class="bandeau">
		<img src="../img/logo.png">
		<h1>Demande de changement de coordonées</h1>
	</div>
	<div class="container">
		<?php
		displayRequest();
		
		function formEcho($a, $i){
			echo "<form action='confirm.php' method='POST'><br>";
			echo "<input type='submit' name='ok' value='confirmer la demande ".$i."'><br>";
			echo "</form>";
		}
		function displayRequest(){
			$i = 1;
			$new = fopen("../../database/Allianz"/*.$_SESSION['assurance'].*/."/demande_changement.csv", "a+");
			while(($new_content = fgetcsv($new)) !== FALSE){
				if($new_content[0] == 0){
					echo "<p>demande de changement de données</p>";
					$old = fopen("../../database/Allianz"/*.$_SESSION['assurance']*/."/".strtoupper(substr($new_content[1],0,1))."/".$new_content[1]."_".$new_content[2]."/coordonnees.csv", "r");
					$old_content = fgetcsv($old);
				  	echo "<p>Nom :".$old_content[0]."</p><br><p>Prénom :".$old_content[1]."</p><br><p>Civilité :".$old_content[4]."</p><br><p>Date de naissance :".$old_content[5]."</p><br><p>Profession :".$old_content[6]."</p><br>";
					echo "<p>Nom :".$new_content[1]."</p><br><p>Prénom :".$new_content[2]."</p><br><p>Civilité :".$new_content[3]."</p><br><p>Date de naissance :".$new_content[4]."</p><br><p>Profession :".$new_content[5]."</p><br>";
					echo "<a href=".$new_content[6]." target='_blank'>voir le justificatif</a><br>";
					formEcho(1, $i);
					fclose($old);
				}else{
					echo "<p>Demande de changement de coordonnées</p>";
					$old = fopen("../../database/Allianz"/*.$_SESSION['assurance']*/."/".strtoupper(substr($new_content[1],0,1))."/".$new_content[1]."_".$new_content[2]."/coordonnees.csv", "r");
					$old_content = fgetcsv($old);
					echo "<p>Adresse :".$old_content[7]."</p><br><p>Code Postal :".$old_content[8]."</p><br><p>Ville :".$old_content[9]."</p><br><p>Téléphone :".$old_content[10]."</p><br><p>Email :".$old_content[11]."</p><br>";
					echo "<p>Adresse :".$new_content[3]."</p><br><p>Code Postal :".$new_content[4]."</p><br><p>Ville :".$new_content[5]."</p><br><p>Téléphone :".$new_content[6]."</p><br><p>Email :".$new_content[7]."</p><br>";
					echo "<a href=".$new_content[8]." target='_blank'>voir le justificatif</a><br>";
					formEcho(2, $i);
					fclose($old);
				}
				$i++;
			}
			fclose($new);
		}
		
		?>
	</div>
	</body>
</html>