<?php
	session_start();
	if (!isset($_SESSION["nom"])) {
		header("Location: Accueil.php");
		exit();
	}
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
			$contrat = $_GET["contrat"];
			$path = "../../database/".$assurance."/".$nom[0]."/".$nom."_".$prenom."/Contrats/contrat_".$contrat."/";
			echo '<object data='.$path.'carte_verte.pdf type="application/pdf" width="700" height="400">
  				<param name="filename" value='.$path.'carte_verte.pdf /> 
  				<a href='.$path.'carte_verte.pdf title="le fichier">Téléchargez le fichier...</a>
			</object>';
			echo '<object data='.$path.'carte_grise.pdf type="application/pdf" width="700" height="400">
  				<param name="filename" value='.$path.'carte_grise.pdf /> 
  				<a href='.$path.'carte_grise.pdf title="le fichier">Téléchargez le fichier...</a>
			</object>';
			$path = "../../database/".$assurance."/".$nom[0]."/".$nom."_".$prenom."/Documents/";
			echo '<object data='.$path.'permis.pdf type="application/pdf" width="700" height="400">
  				<param name="filename" value='.$path.'permis.pdf /> 
  				<a href='.$path.'permis.pdf title="le fichier">Téléchargez le fichier...</a>
			</object>';

		?>
        <div id="test">Affichage informations utilisateur scanné</div> 
        <script type="text/javascript" src="./JS/messagerie.js"></script> 
		
			<!-- bouton de déconnexion -->
		<form method="POST" action="../deconnexion.php">
			<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
		 </form>
	</body>
</html>