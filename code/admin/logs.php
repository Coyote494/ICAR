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
		<div id = "logs">
			<?php
				$path = "../../database/logs.csv";
				if (($handle = fopen($path, 'r'))) {
					while($data = fgetcsv($handle, 1000, ",")){
						echo "<p>[".$data[0]."] ".$data[1]."</p>";
					}
					fclose($handle);
				}
			?>
		</div>
		<script type="text/javascript" src="./JS/admin.js"></script>
			<!-- bouton de déconnexion -->
	<form method="POST" action="../deconnexion.php">
		<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
	</form>
	</body>
</html>