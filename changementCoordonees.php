<!DOCTYPE html>
<html>
	<head>
		<title>Changement de coordonées</title>
		
	</head>
	<body>
		<h1>Demandes De Changement de Coordonées :</h1>
		<?php
			if(isset($_COOKIE['modif_donnees'])){
				$content = explode(";", $_COOKIE[$valeur]);
				$f = fopen(."coordonees.csv", "r");
				$data = fgetcsv($f);
				echo "<p>Anciennes Coordonées:</p><br><p>Nom: ".$data[0]."</p><br><p>Prénom: ".$data[1]."</p><br><p>Civilité: ".$data[4]."</p><br><p>Date de naissance: ".$data[5]."</p><br><p>Profession: ".$data[6]."</p><br>";
				echo "<p>Nouvelles Coordonées:</p><p>Nom: ".$content[0]."</p><br><p>Prénom: ".$content[1]."</p><br><p>Civilité: ".$content[2]."</p><br><p>Date de naissance: ".$content[3]."</p><br><p>Profession: ".$content[4]."</p><br>";
				echo "<a href='".$content[5]."' target='_blank'>Cliquez pour voir le justificatif</a>"
				echo "<a href='mailto:".$data[11]."'>Envoyer un email en cas de problème</a>"
				echo "<input type='button' value='Confirmer la demande' action='confirm.php' name='confirm'>"
				fclose($f);
			}
			
			if(isset($_COOKIE['modif_adresse'])){
				$content = explode(";", $_COOKIE[$valeur]);
				$f = fopen(."coordonees.csv", "r");
				$data = fgetcsv($f);
				echo "<p>Anciennes Coordonées:</p><br><p>Nom: ".$data[0]."</p><br><p>Prénom: ".$data[1]."</p><br><p>Adresse: ".$data[7]."</p><br><p>Code Postal: ".$data[8]."</p><br><p>Ville: ".$data[9]."</p><br>><p>Téléphone: ".$data[10]."</p><br><p>Email: ".$data[11]."</p><br";
				echo "<p>Nouvelles Coordonées:</p><br><p>Nom: ".$data[0]."</p><br><p>Prénom: ".$data[1]."</p><br><p>Adresse: ".$content[0]."</p><br><p>Code Postal: ".$content[1]."</p><br><p>Ville: ".$content[2]."</p><br>><p>Téléphone: ".$content[3]."</p><br><p>Email: ".$content[4]."</p><br";
				echo "<a href='".$content[5]."' target='_blank'>Cliquez pour voir le justificatif</a>";
				echo "<a href='mailto:".$data[11]."'>Envoyer un email en cas de problème</a>"
				echo "<input type='button' value='Confirmer la demande' action='confirm2.php' name='confirm'>"
			}
		?>
	</body>
</html>