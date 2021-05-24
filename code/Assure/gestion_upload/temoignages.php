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
				$path = "../../../database/client/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/Sinistres/";
				if(!isset($_SESSION["sinistre"])){
					$i = 1;
					while(file_exists($path."Sinistre_".$i)){
						$i++;
					}
					mkdir($path."Sinistre_".$i, 0777);
					$_SESSION["sinistre"] = $i;
				}
				$path = $path."Sinistre_".$_SESSION["sinistre"];
                //on déplace le fichier uploadé des fichiers temporaires dans son dossier de stockage
                // et on vérifie que l'opéation s'est bien passé
				$extension = explode('.', $_FILES['fileToUpload']['name']) ; //on enregistre le fichier sous la bonne extension
                $n = count($extension);
                $i = 0;
                $verif = 1;
                //comme on peut ajouter plusieurs images/témoignages il faut tous les garder en mémoire
                while($verif){
                	if(file_exists($path."/temoignages".$i.".".$extension[$n-1])){
                		$i++;
                	}else{
                		$verif = 0;
                	}
                }
			  	$res = move_uploaded_file( 
			        $_FILES['fileToUpload']['tmp_name'], 
			        $path."/temoignages".$i.".".$extension[$n-1]);
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