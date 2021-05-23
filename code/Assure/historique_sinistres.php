<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Historique des sinistres</title>
		<link rel="stylesheet" type="text/css" href="historique_sinistre.css" />
		<meta charset="utf-8">
	</head>
	<body>

		<div class="bandeau">
			<img src="../img/logo.png">
        	<h2>Historique des sinistres</h2>
        </div>		
		<?php
			$path = "../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/Sinistres";
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
			ScanDirectory($path);
		?>


		<!-- bouton de déconnexion -->
		<form method="POST" action="../deconnexion.php">
			<input type="submit" name="OUT" value="Déconnexion"/>
		</form>

	</body>
</html>