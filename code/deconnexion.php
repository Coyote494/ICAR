<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Deconnexion</title>
	</head>
	<body>
		<?php
			if (isset($_POST["OUT"])){
				session_destroy();
				header('Location: connexion.php');
			}
		?>
	</body>
</html>