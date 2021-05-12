<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Upload lettre</title>
		<meta charset="utf-8">
	</head>
	<body>
        <?php
            //on vérifie s'il y a des erreurs d'upload
			if ($_FILES['fileToUpload']['error']  > 0 ) {
				header('Location: ../declarer_vente.php?upload=echec');
			  	exit();
			} else{
                //on déplace le fichier uploadé des fichiers temporaires dans son dossier de stockage
                // et on vérifie que l'opéation s'est bien passé
				$extension = explode('.', $_FILES['fileToUpload']['name']) ; //on enregistre le fichier sous la bonne extension
                $n = count($extension);
			  	$res = move_uploaded_file( 
			        $_FILES['fileToUpload']['tmp_name'], 
			        "../cession.".$extension[$n-1]);
			  	if($res){
                    header('Location: ../declarer_vente.php?upload=sucess');
			  		exit();
			  	}else{
                    header('Location: ../declarer_vente.php?upload=echec');
			  		exit();
			  	}
			}
	    ?>
	</body>
</html>