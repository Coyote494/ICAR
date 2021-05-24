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
		<div id ="messages">
		<?php
			$path = "../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
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
		</div>
		<div><input type="text" name="mon_message" id="mon_message" placeholder="Ecrivez votre message ici." size="30" autofocus></div>
		<div><button type ="button" onclick = "messagerie()"><img src="./img/send-button.png" alt ="bouton envoi" height="20px" width="20px"></button></div>
		<script type="text/javascript" src="./JS/messagerie.js?v=<?= filemtime('js/script.js'); ?>"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</body>
</html>