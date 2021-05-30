<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Déclaration de vente</title>
		<link rel="stylesheet" type="text/css" href="./CSS/declarer_vente.css" />
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
		<img src="../img/logo.png">
		<h2>Déclaration de vente</h4>
	</div>
	<div class="voiture-rtl">
    	<div><img src="./img/voiture.png"></div>
	</div>
	<div class="container">
		<div class="certificat">
			<p>Voici un exemple vierge de certificat de cession :</br> <a href="./documents_administratifs/cerfa_cession.pdf" target = "_blank">Déclaration_de_vente.pdf</a></p>
    		<form enctype="multipart/form-data" method="post" action="./gestion_upload/cession.php">
    		</form>
   		 </div>
   		 <div class="fichier">
			<p> Veuillez importer vos fichiers : </br> <input type="file" name="fileToUpload"></p>
			<p><input type="submit" value="Importer" class="bouton" ></p>
		</div>
	</div>
	<div class="deconnexion">
	<!-- bouton de déconnexion -->
	<form method="POST" action="../deconnexion.php">
		<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
	</form>
</div>
	</body>
</html>