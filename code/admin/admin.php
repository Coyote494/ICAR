<!DOCTYPE html>
<html>
	<head>
		<title>Administrateur</title>
		<link rel="stylesheet" type="text/css" href="./CSS/admin.css" />
	</head>
	<body>
	<div class="bandeau"> 
		<img src="../img/logo.png">
        <h2>Bienvenue sur votre page administrateur</h2>
    </div>

    <div class="voiture-rtl">
        <div><img src="img/voiture.png"></div>
    </div>
    <fieldset>
		<legend><strong>Ajouter une nouvelle assurance/agence </strong></legend>
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
	</fieldset>
	<fieldset>
		<legend><strong>Ajouter un nouveau gestionnaire </strong></legend>>
		<form action='newGestionnaire.php' method='POST'>
			Choisissez l'assurance :
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

	</fieldset>
	
	<fieldset>
		<legend>Ajouter une nouvelle force de l'ordre :</legend>
		<form action='newForce.php' method='POST'>
			<label for="nom">Nom de la force de l'ordre :</label>
			<input name="nom" placeholder="Entrez le nom" required=""><br>
			<label for="prenom">Prénom de la force de l'ordre :</label>
			<input name="prenom" placeholder="Entrez le prénom" required=""><br>
			<label for="mail">Mail de la force de l'ordre :</label>
			<input name="mail" placeholder="Entrez le mail" required=""><br>
			<input type="submit" value="Ajouter" class="bouton">
		</form>
	</fieldset>
		<fieldset>
		<div id = "logs">
		<legend>Logs</legend>
			<?php
				$path = "../../database/logs.csv";
				if (($handle = fopen($path, 'r'))) {
					while($data = fgetcsv($handle, 1000, ",")){
						echo "<p>[".$data[0]."] ".$data[1]."</p>";
					}
					fclose($handle);
				}
			?>
		
	</fieldset>
	</div>
	</body>
			<!-- bouton de déconnexion -->
		<div class="deconnexion">
			<form method="POST" action="../deconnexion.php">
			<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
	        </form>
	    </div>
	</body>
</html>