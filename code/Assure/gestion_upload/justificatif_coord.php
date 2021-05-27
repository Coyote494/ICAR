<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Upload Justificatif</title>
		<meta charset="utf-8">
	</head>
	<body>
        <?php
			$path = "../../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/Documents/";
            //on vérifie s'il y a des erreurs d'upload
			if ($_FILES['fileToUpload']['error']  > 0 ) {
				header('Location: ../changement_coord.php?upload=echec');
			  	exit();
			} else{
                //on déplace le fichier uploadé des fichiers temporaires dans son dossier de stockage
                // et on vérifie que l'opéation s'est bien passé
				$extension = explode('.', $_FILES['fileToUpload']['name']) ; //on enregistre le fichier sous la bonne extension
                $n = count($extension);
                $i = 0;
                $verif = 1;
                //comme on peut ajouter plusieurs images/témoignages il faut tous les garder en mémoire
                while($verif){
                	if(file_exists($path."justificatif".$i.".".$extension[$n-1])){
                		$i++;
                	}else{
                		$verif = 0;
                	}
                }
			  	$res = move_uploaded_file( 
			        $_FILES['fileToUpload']['tmp_name'], 
			        $path."justificatif".$i.".".$extension[$n-1]);
			  	if($res){
                    header('Location: ../changement_coord.php?upload=sucess');
			  		exit();
			  	}else{
                    header('Location: ../changement_coord.php?upload=echec');
			  		exit();
			  	}
			}
	    ?>
	</body>
</html>