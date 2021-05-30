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
			$path = "../../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/Documents/";
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
			        $path."cession.".$extension[$n-1]);
			  	if($res){
			  		if (($handle = fopen("../../../database/logs.csv", "a"))) {	
			    		date_default_timezone_set('Europe/Paris');
						$donnes = array(date('d-m-y h:i:s'), "L'assuré ".$_SESSION["nom"]." ".$_SESSION["prenom"]." a déclaré une cession de véhicule.");
						fputcsv($handle, $donnes, ',');
						fclose($handle);
					}
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