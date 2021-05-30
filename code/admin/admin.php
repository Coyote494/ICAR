<!DOCTYPE html>
<html>
	<head>
		<title>Administrateur</title>
	</head>
	<body>
		<form action='newContract.php' method='POST'>
			<p>Nom officiel de l'agence <input type="text" name="nom" required></p>
			<input type="submit" value="entrer un nouvelle agence" class="bouton">
		</form>
		<div id = "logs">
			<?php
				$path = "../../database/logs.csv";
				if (($handle = fopen($path, 'r'))) {
					while($data = fgetcsv($handle, 1000, ",")){
						echo "<p>[".$data[0]."] ".$data[1]."</p>";
					}
					fclose($handle);
				}
			?>
		</div>
			<!-- bouton de déconnexion -->
		<form method="POST" action="../deconnexion.php">
			<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
		</form>
	</body>
</html>