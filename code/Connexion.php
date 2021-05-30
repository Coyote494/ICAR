<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Connexion</title>
		<link rel="stylesheet" type="text/css" href="./CSS/connexion.css" />
	</head>
	<body>
		<div class="cadre">
		<div class="bandeau">
			<img src="./img/logo.png">
	<h1>Portail de connexion</h1> <!--formulaire-->
</div>
<div class="portail">
	<form method="post" action="./verification_connexion.php">
		<p>Identifiant : <input type="text" name="id" required> </p> <!--zone de texte pour que l'utilisateur la remplisse-->
		<p>Mot de passe : <input type="password" name="mdp" required></p> <!--zone de texte pour que l'utilisateur la remplisse-->
		<p><input type="submit" value="valider" class="bouton"></p> <!--bouton qui envoie à la page suivante-->
	</form>
</div>

	<div>
		<?php
			if (isset($_GET["erreur"])) {
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