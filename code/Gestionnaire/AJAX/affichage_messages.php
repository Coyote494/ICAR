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
			$fichier = "../../../database/".$_SESSION["assurance"]."/messages_clients.csv";
			$path = "../../../database/".$_SESSION["assurance"]."/".$_POST["nom"][0]."/".$_POST["nom"]."_".$_POST["prenom"]."/";
			echo "<div><span id = 'nom'>".$_POST["nom"]."</span> <span id = 'prenom'>".$_POST["prenom"]."</span></div>";
			if (($handle = fopen($path."discussion.csv", "r"))) {
				while (($data = fgetcsv($handle, 1000, ","))) {
					if($data[0] == "assure"){
						echo "<div class = 'asssure'>".$data[1]."</div>";
					}else{
						echo "<div class = 'gestionnaire'>".$data[1]."</div>";
					}
					
				}
				fclose($handle);
			}
			$i = 0;
			if (($handle = fopen($fichier, "r"))) {
				while (($data = fgetcsv($handle, 1000, ","))) {
					$tab[$i] = $data;
					if($tab[$i][0] == $_POST["nom"] && $tab[$i][1] == $_POST["prenom"]){
						$tab[$i][2] = "0";
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