<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Accueil Visiteur</title>
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
        	echo '<div class="portail">';
			echo '<form method="post" action="./verification_connexion_visiteur.php?nom='.$nom.'&prenom='.$prenom.'&assurance='.$assurance.'">';
		?>	
			<p>Identifiant : <input type="text" name="id" required> </p> <!--zone de texte pour que l'utilisateur la remplisse-->
				<p>Mot de passe : <input type="password" name="mdp" required></p> <!--zone de texte pour que l'utilisateur la remplisse-->
				<p><input type="submit" value="valider"></p> <!--bouton qui envoie à la page suivante-->
			</form>
		</div> 
        <script type="text/javascript" src="./JS/messagerie.js"></script> 
	</body>
</html>