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
			$path = "../../../database/".$_SESSION["assurance"]."/".$_POST["nom"][0]."/".$_POST["nom"]."_".$_POST["prenom"]."/";
			if (($handle = fopen($path."discussion.csv", "r"))) {
				while (($data = fgetcsv($handle, 1000, ","))) {
					if($data[0] == "client"){
						echo "<div class = 'asssure'>".$data[1]."</div>";
					}else{
						echo "<div class = 'gestionnaire'>".$data[1]."</div>";
					}
					
				}
				fclose($handle);
			}
		?>
	</body>
</html>