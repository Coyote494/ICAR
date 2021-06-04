<!DOCTYPE html>
<html>
	<head>
		<title>Administrateur</title>
	</head>
	<body>
		<?php
			$path = "../../database/problemes.csv";
			if (($handle = fopen($path, 'r'))) {
				while($data = fgetcsv($handle, 1000, ",")){
					echo "<p>[".$data[0]."] {".$data[1]."} ".$data[2]."</p>";
				}
				fclose($handle);
			}
		?>
	</body>
</html>