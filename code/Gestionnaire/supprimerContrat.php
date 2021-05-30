<?php
session_start();
if (!isset($_SESSION["nom"])) {
    header("Location: Accueil.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Vente de véhicule</title>
	</head>
	<body>
		<?php
		$path = '../../database/'.$_SESSION['assurance'].'/';
		listSells($path);
		
			function listSells($path){
				if($f = fopen($path.'/liste_clients.csv', 'r')){
					while($line = fgetcsv($f)){
						//chemin qui mêne au certificat de cession
						$chemin = $path.strtoupper(substr($line[0],0,1)).'/'.$line[0].'_'.$line[1].'/Documents/cession.pdf';
						if(file_exists($chemin)){
							echo '<p>Le client '.$line[0].' '.$line[1].' a vendu sa voiture</p><br>';
							echo '<li><a href ="cession.pdf" target="_blank">certificat de cession</a></li>';
							echo "<p>Justificatif: </p><br>";
							echo "<form action='supprimer.php' method='POST'><br><input type='text' name='dir' value="$line[0]."_".$line[1]"><br><input type='submit' name='end' value='mettre fin au contrat'><br></form><br>";
						}	
					}
				}
			}			
			
		?>
			<!-- bouton de déconnexion -->
	<form method="POST" action="../deconnexion.php">
		<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
	</form>		
	</body>
</html>