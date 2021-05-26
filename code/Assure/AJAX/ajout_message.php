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
			$path = "../../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/";
			$fichier = "../../../database/".$_SESSION["assurance"]."/messages_clients.csv";
			if (($handle = fopen($path."discussion.csv", "a"))) {
				$tab = array(
					$_SESSION["rang"],
					$_POST["message"]
					);
				fputcsv($handle, $tab, ",");
				fclose($handle);
			}
			$i = 0;
			if (($handle = fopen($fichier, "r"))) {
				while (($data = fgetcsv($handle, 1000, ","))) {
					$tab[$i] = $data;
					if($tab[$i][0] == $_SESSION["nom"] && $tab[$i][1] == $_SESSION["prenom"]){
						$tab[$i][2] = "1";
					}
					$i++;
				}
				fclose($handle);
			}
			if (($handle = fopen($fichier, "w"))) {
				for($j = 0; $j < $i; $j++){
					fputcsv($handle, $tab[$j], ",");
				}
				fclose($handle);
			}
		?>
	</body>
</html>