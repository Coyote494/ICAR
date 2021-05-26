<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Modifier MDP</title>
		<link rel="stylesheet" type="text/css" href="./CSS/modifierMDP.css" />
		<meta charset="utf-8">
	</head>
	<body>
	<div class="bandeau">
		<img src="../img/logo.png">
		<h1>Modifier votre mot de passe</h1>
	</div>

	<div class="container">
		<form method="post" action="./mdp.php">
            <label for="old_mdp">Ancien mot de passe :</label></br></br>
			<input type="password" name="old_mdp" required></label></br></br>

			<label for="mdp">Nouveau mot de passe :</label></br></br>
			<input type="password" name="mdp" required></br></br>
			<label for="mdp2">Saisissez à nouveau votre mot de passe :</label></br></br>
			<input type="password" name="mdp2" required></br></br>

			<input type="submit" value="Changer mot de passe" class="bouton">
		</form>
		<?php
			if (isset($_GET["erreur"])) {
                if($_GET["erreur"] ==1)
			        echo "<script>alert('Les deux mots de passe sont différents ! Veuillez réessayer.');</script>" ;
                else if($_GET["erreur"] == 2 )
                    echo "<script>alert('L\'ancien mot de passe est incorrect ! Veuillez réessayer.');</script>" ;
				else 
					echo "<script>alert('Mot de passe modifié avec succès !');</script>" ;
			}   
		?>
		<form action="./accueil_assure.php">
   			<p><input type="submit" value="Retour à l'accueil" class="bouton"></p>
		</form>
	</div>
	</body>
</html>