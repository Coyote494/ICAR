<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Messagerie</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			$path = "../../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
			if (($handle = fopen($path."discussion.csv", "r"))) {
				while (($data = fgetcsv($handle, 1000, ","))) {
					if($data[0] == "assure"){
						echo "<div class = 'assure'>".$data[1]."</div>";
					}else{
						echo "<div class = 'gestionnaire'>".$data[1]."</div>";
					}
					
				}
				fclose($handle);
			}
		?>
	</body>
</html>