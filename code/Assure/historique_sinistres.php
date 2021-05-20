<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Historique des sinistres</title>
		<meta charset="utf-8">
	</head>
	<body>

		<!-- bouton de déconnexion -->
		<form method="POST" action="../deconnexion.php">
			<input type="submit" name="OUT" value="Déconnexion"/>
		</form>

        <div>Historique des sinistres</div>
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


	</body>
</html>