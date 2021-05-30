 <?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Ajout message</title>
		<meta charset="utf-8">
	</head>
	<body>
        <div><input type="text" name="mon_message" id="mon_message" placeholder="Ecrivez votre message ici." size="30" autofocus></div>
		<div><button type ="button" onclick = "messagerie()"><img src="./img/send-button.png" alt ="bouton envoi" height="20px" width="20px"></button></div>
	</body>
</html>