<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Déclaration de vente</title>
		<meta charset="utf-8">
	</head>
	<body>

	<!-- bouton de déconnexion -->
	<form method="POST" action="../deconnexion.php">
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

	<h4>Déclaration de vente</h4>
	<p>Certifiat de cession de vierge: <a href="./documents_administratifs/cerfa_cession.pdf" target = "_blank">Déclaration_de_vente.pdf</a></p>
    <form enctype="multipart/form-data" method="post" action="./gestion_upload/cession.php">
		<p><input type="file" name="fileToUpload"></p>
		<p><input type="submit" value="Importer"></p>
	</form>

	<p><strong>Remplir mon certificat de cession en ligne :</strong></p>
	<p><a href="./formulaire_cession_acheteur/cession_acheteur.php" target ="_self" >Remplir le certificat de cession en tant qu'acheteur.</a></p>
	<p><a href="./formulaire_cession_vendeur/cession_vendeur.php" target ="_self" >Remplir le certificat de cession en tant que vendeur.</a></p>

	</body>
</html>