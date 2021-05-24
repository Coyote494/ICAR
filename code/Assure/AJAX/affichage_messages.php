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
					if($data[0] == "client"){
						echo "<div class = 'asssure'>".$data[1]."</div>";
					}else{
						echo "<div class = 'gestionnaire'>".$data[1]."</div>";
					}
					
				}
				fclose($handle);
			}
		?>
		<script type="text/javascript" src="./JS/messagerie.js?v=<?= filemtime('js/script.js'); ?>"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</body>
</html>