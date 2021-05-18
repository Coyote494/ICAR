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
				header('Location: ../declarer_sinistre.php?upload=echec');
			  	exit();
			} else{
				$path = "/icar/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/Sinistres/";
				if(!isset($_SESSION["sinistre"])){
					$i = 1;
					while(file_exists($path."Sinistre_".$1)){
						$i++;
					}
					$_SESSION["sinistre"] = $i;
				}
				$path = $path."Sinistre_".$_SESSION["sinistre"];
                //on déplace le fichier uploadé des fichiers temporaires dans son dossier de stockage
                // et on vérifie que l'opéation s'est bien passé
                $extension = explode('.', $_FILES['fileToUpload']['name']) ;
                $n = count($extension);
			  	$res = move_uploaded_file( 
			        $_FILES['fileToUpload']['tmp_name'], 
			         $path."/constat.".$extension[$n-1]);
			  	if($res){
                    header('Location: ../declarer_sinistre.php?upload=sucess');
			  		exit();
			  	}else{
                    header('Location: ../declarer_sinistre.php?upload=echec');
			  		exit();
			  	}
			}
	    ?>
	</body>
</html>