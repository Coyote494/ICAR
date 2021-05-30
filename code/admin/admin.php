<!DOCTYPE html>
<html>
	<head>
		<title>Administrateur</title>
	</head>
	<body>
		<h1>Ajouter une nouvelle assurance/agence :</h1>
		<form action='newContract.php' method='POST'>
			<label for="nomAssurance">Nom de l'Assurance/Agence :</label>
			<input name="nomAssurance" placeholder="Entrez le nom de l'assurance" required=""><br>
			<label for="nom">Nom du gestionnaire de l'assurance:</label>
			<input name="nom" placeholder="Entrez le nom" required=""><br>
			<label for="prenom">Prénom du gestionnaire de l'assurance :</label>
			<input name="prenom" placeholder="Entrez le prénom" required=""><br>
			<label for="mail">Mail du gestionnaire de l'assurance :</label>
			<input name="mail" placeholder="Entrez le mail" required=""><br>
			<input type="submit" value="Ajouter" class="bouton">
		</form>
		<h1>Ajouter un nouveau gestionnaire :</h1>
		<form action='newGestionnaire.php' method='POST'>
			<select name="assurance" required>
				<?php
					$Directory = "../../database";
					$MyDirectory = opendir($Directory) or die('Erreur');
				 	while(false != ($Entry = readdir($MyDirectory))) {
				 		if(is_dir($Directory.'/'.$Entry)&& $Entry != '.' && $Entry != '..') {
				 			echo "<option>".$Entry."</option>";
				 		}
				 	}
				?>
			</select></br>
			<label for="nom">Nom du gestionnaire :</label>
			<input name="nom" placeholder="Entrez le nom" required=""><br>
			<label for="prenom">Prénom du gestionnaire :</label>
			<input name="prenom" placeholder="Entrez le prénom" required=""><br>
			<label for="mail">Mail du gestionnaire :</label>
			<input name="mail" placeholder="Entrez le mail" required=""><br>
			<input type="submit" value="Ajouter" class="bouton">
		</form>
		<h1>Logs</h1>
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