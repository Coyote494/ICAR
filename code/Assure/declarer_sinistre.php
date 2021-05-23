<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Déclaration de sinistre</title>
		<link rel="stylesheet" type="text/css" href="declarer_sinistre.css" />
		<meta charset="utf-8">
	</head>
	<body>


		<?php
			if (isset($_GET["upload"])) {
				if($_GET["upload"] == "echec"){
					echo '<script>alert("Echec lors de l\'upload du fichier !");</script>' ;
				}else{
					echo '<script>alert("Fichier uploadé avec succès !");</script>' ;
				}
			}
		?>
	<div class="bandeau">
		<img src="/Projet/code/img/logo1.png">
    	<h1>Déclarer un sinistre</h1>
    </div>
		<div>
			<div class="container">
			<!-- formulaire d'upload de la déclaration de sinistre -->
			<div class="lettre">
			<h4>Lettre de déclaration du sinistre</h4>
			<p>Déclaration de sinistre pré-remplie : <a href="./documents_administratifs/declaration-de-sinistre.pdf" target = "_blank">Déclaration_de_sinistre.pdf</a></p>
			<form enctype="multipart/form-data" method="post" action="./gestion_upload/lettre.php">
				Veuillez selectionner des fichiers à importer
				<p><input type="file" name="fileToUpload"></p>
				<input type="submit" value="Importer">
			</form>
		</div>
			<div class="constat">
			<!-- formulaire d'upload du constat amiable -->
			<h4>Ajouter un constat amiable (dans le cas d'un accident)</h4>
			<p>Voici un formulaire de constat amiable : <a href="./documents_administratifs/constat-amiable-europeen-daccident-automobile.pdf" target = "_blank">constat_amiable.pdf</a></p>
			<p>Vous pouvez aussi utiliser l'application e-constat disponible sur mobile.</p>
			
				<p><a href="https://play.google.com/store/apps/details?id=com.darva.econstat" target = "_blank"><img src="img/logo_gplay.png" alt="Logo du playstore"></a></p>
				<p><a href="https://apps.apple.com/fr/app/e-constat-auto/id929638366" target = "_blank"><img src="img/logo_astore.png" alt="Logo de l'apstore"></a></p>
			
			
			<form enctype="multipart/form-data" method="post" action="./gestion_upload/constat.php">
				<p><input type="file" name="fileToUpload"></p>
				<p><input type="submit" value="Importer"></p>
			</form>
		</div>
			<div class="images">
			<!-- formulaire d'upload des images ou des témoignages -->
			<h4>Ajouter des images ou d'autres preuves (facultatif)</h4>
			<form enctype="multipart/form-data" method="post" action="./gestion_upload/temoignages.php">
				Veuillez selectionner des images à importer
				<p><input type="file" name="fileToUpload"></p>
				<p><input type="submit" value="Importer"></p>
			</form>
		</div>

			<div class="depot">
			<!-- formulaire d'upload du dépôt de plainte -->
			<h4>Ajouter une copie du dépôt de plainte (dans le cas d'un vol)</h4>
			<form enctype="multipart/form-data" method="post" action="./gestion_upload/plainte.php">
				Veuillez selectionner votre copie de dépôt
				<p><input type="file" name="fileToUpload"></p>
				<p><input type="submit" value="Importer"></p>
			</form>
		</div>
	</div>
	<div class="deconnexion">
		<!-- bouton de déconnexion -->
		<form method="POST" action="../deconnexion.php">
		    <input type="submit" name="OUT" value="Déconnexion"/>
		</form>
	</div>
	</body>
</html>