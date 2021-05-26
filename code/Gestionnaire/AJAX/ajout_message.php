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
		<?php
			$path = "../../../database/".$_SESSION["assurance"]."/".$_POST["nom"][0]."/".$_POST["nom"]."_".$_POST["prenom"]."/";
			$fichier = "../../../database/".$_SESSION["assurance"]."/messages_clients.csv";
			if (($handle = fopen($path."discussion.csv", "a"))) {
				$tab = array(
					$_SESSION["rang"],
					$_POST["message"]
					);
				fputcsv($handle, $tab, ",");
				fclose($handle);
			}
		?>
	</body>
</html>