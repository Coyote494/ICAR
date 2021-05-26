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
			$path = "../../../database/".$_SESSION["assurance"]."/";
			if (($handle = fopen($path."messages_clients.csv", "r"))) {
				while (($data = fgetcsv($handle, 1000, ","))) {
					if($data[2] == 1)
						echo '<button onclick=afficher_conversation("'.$data[0].'","'.$data[1].'")>'.$data[0].' '.$data[1].' Nouveau(x) message(s)</button>';
					else
						echo '<button onclick=afficher_conversation("'.$data[0].'","'.$data[1].'")>'.$data[0].' '.$data[1].' Voir conversation</button>';
				}
				fclose($handle);

			}
		?>	
	</body>
</html>