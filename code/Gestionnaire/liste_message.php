<?php
	session_start();
if (!isset($_SESSION["nom"])) {
    header("Location: Accueil.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Messagerie</title>
		<link rel="stylesheet" type="text/css" href="./CSS/listemessage.css" />
		<meta charset="utf-8">
	</head>
	<body>
		<div id="liste_message">
		<?php
			$path = "../../database/".$_SESSION["assurance"]."/";
			if (($handle = fopen($path."messages_clients.csv", "r"))) {
				while (($data = fgetcsv($handle, 1000, ","))) {
					if($data[2] == 1)
						echo '<button onclick=afficher_conversation_r("'.$data[0].'","'.$data[1].'")>'.$data[0].' '.$data[1].' Nouveau(x) message(s)</button>';
					else
						echo '<button onclick=afficher_conversation_r("'.$data[0].'","'.$data[1].'")>'.$data[0].' '.$data[1].' Voir conversation</button>';
				}
				fclose($handle);

			}
		?>
		</div>
		<div id="conversation"></div>
		<div id="saisie"></div>
		<script type="text/javascript" src="./JS/liste_message.js"></script>
	</body>
</html>