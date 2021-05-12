<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Déclaration de sinistre</title>
		<meta charset="utf-8">
	</head>
	<body>

		<!-- bouton de déconnexion -->
		<form method="POST" action="deconnexion.php">
		    <input type="submit" name="OUT" value="Déconnexion"/>
		</form>

		<?php
			if (isset($_GET["upload"])) {
				if($_GET["upload"] == "echec"){
					echo '<script>alert("Echec lors de l\'upload du fichier !");</script>' ;
				}else{
					echo '<script>alert("Fichier uploadé avec succès !");</script>' ;
				}
			}
		?>

    	<h1>Déclarer un sinistre</h1>
		<div>
			<!-- formulaire d'upload de la déclaration de sinistre -->
			<h4>Lettre de déclaration du sinistre</h4>
			<p>Déclaration de sinistre pré-remplie : <a href="./documents_administratifs/declaration-de-sinistre.pdf">Déclaration_de_sinistre.pdf</a></p>
			<form enctype="multipart/form-data" method="post" action="./gestion_upload/lettre.php">
				<p><input type="file" name="fileToUpload"></p>
				<p><input type="submit" value="Importer"></p>
			</form>

			<!-- formulaire d'upload du constat amiable -->
			<h4>Ajouter un constat amiable (dans le cas d'un accident)</h4>
			<p>Voici un formulaire de constat amiable : <a href="./documents_administratifs/constat-amiable-europeen-daccident-automobile.pdf">constat_amiable.pdf</a></p>
			<p>Vous pouvez aussi utiliser l'application e-constat disponible sur mobile.</p>
			
			<div>
				<p><a href="https://play.google.com/store/apps/details?id=com.darva.econstat"><img src="img/logo_gplay.png" alt="Logo du playstore"></a></p>
				<p><a href="https://apps.apple.com/fr/app/e-constat-auto/id929638366"><img src="img/logo_astore.png" alt="Logo de l'apstore"></a></p>
			</div>
			
			<form enctype="multipart/form-data" method="post" action="./gestion_upload/constat.php">
				<p><input type="file" name="fileToUpload"></p>
				<p><input type="submit" value="Importer"></p>
			</form>

			<!-- formulaire d'upload des images ou des témoignages -->
			<h4>Ajouter des images ou d'autres preuves (facultatif)</h4>
			<form enctype="multipart/form-data" method="post" action="./gestion_upload/temoignages.php">
				<p><input type="file" name="fileToUpload"></p>
				<p><input type="submit" value="Importer"></p>
			</form>

			<!-- formulaire d'upload du dépôt de plainte -->
			<h4>Ajouter une copie du dépôt de plainte (dans le cas d'un vol)</h4>
			<form enctype="multipart/form-data" method="post" action="./gestion_upload/plainte.php">
				<p><input type="file" name="fileToUpload"></p>
				<p><input type="submit" value="Importer"></p>
			</form>
		</div>
	</body>
</html>