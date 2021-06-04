<?php
session_start();
if (!isset($_SESSION["nom"])) {
    header("Location: ../Accueil.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Administrateur</title>
		<link rel="stylesheet" type="text/css" href="./CSS/admin.css" />
	</head>
	<body>
		<div id = "problemes">
			<?php
				$path = "../../database/problemes.csv";
				if (($handle = fopen($path, 'r'))) {
					while($data = fgetcsv($handle, 1000, ",")){
						echo "<p>[".$data[0]."] {".$data[1]."} ".$data[2]."</p>";
					}
					fclose($handle);
				}
			?>
		</div>
		<script type="text/javascript" src="./JS/problemes.js"></script>
			<!-- bouton de déconnexion -->
	</body>
</html>