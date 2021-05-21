<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Accueil Force de l'Ordre</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			$nom = $_GET["nom"];
			$prenom = $_GET["prenom"];
			$assurance	= $_GET["assurance"];
			$path = "../../database/".$assurance."/".$nom[0]."/".$nom."_".$prenom."/Documents/";
			echo '<object data='.$path.'fichier.pdf type="application/pdf" width="700" height="400">
  				<param name="filename" value='.$path.'fichier.pdf /> 
  				<a href='.$path.'fichier.pdf title="le fichier">Téléchargez le fichier...</a>
			</object>';

		?>
        <div>Affichage informations utilisateur scanné</div>  
	</body>
</html>