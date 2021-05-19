<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Connexion</title>
		<link rel="stylesheet" type="text/css" href="connexion.css" />
	</head>
	<body>
		<div class="cadre">
		<div class="bandeau">
			<img src="img/logo1.png">
	<h1>Portail de connexion</h1> <!--formulaire-->
</div>
<div class="portail">
	<form method="post" action="verificationConnexion.php">
		<p>Identifiant : <input type="text" name="id" required> </p> <!--zone de texte pour que l'utilisateur la remplisse-->
		<p>Mot de passe : <input type="password" name="mdp" required></p> <!--zone de texte pour que l'utilisateur la remplisse-->
		<p><input type="submit" value="valider"></p> <!--bouton qui envoie à la page suivante-->
	</form>
	<form method="POST" action="connexion.php">
		<input type="submit" name="OUT" value="deconnexion"/> <!--on créé un bouton deconnexion qui renvoie au portail de co -->
	</form>
</div>

	<div>
		<?php
			if (isset($_GET["error"])) {
				echo "Vous vous êtes trompé(e)s";
			}
			if (isset($_POST["OUT"])){
				session_destroy();
			}
		?>
	<div class="mdp_forget">
  <p><a href="#">Mot de passe oublié ?</a></p>
</div>
	</div>
	</div>
	</body>
</html>