<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Connexion</title>
	</head>
	<body>
	<h1>Portail de connexion</h1> <!--formulaire-->
	<form method="post" action="verificationConnexion.php">
		<p>Identifiant : <input type="text" name="id" required> </p> <!--zone de texte pour que l'utilisateur la remplisse-->
		<p>Mot de passe : <input type="password" name="mdp" required></p> <!--zone de texte pour que l'utilisateur la remplisse-->
		<p><input type="submit" value="valider"></p> <!--bouton qui envoie à la page suivante-->
	</form>
	<form method="POST" action="connexion.php">
		<input type="submit" name="OUT" value="deconnexion"/> <!--on créé un bouton deconnexion qui renvoie au portail de co -->
	</form>

	<div>
		<?php
			if (isset($_GET["error"])) {
				echo "Vous vous êtes trompré(e)s";
			}
			if (isset($_POST["OUT"])){
				session_destroy();
			}
		?>
	</div>
	</body>
</html>