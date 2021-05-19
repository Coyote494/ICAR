<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Modifier MDP</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form method="post" action="./mdp.php">
            <p>Ancien Mot de passe<input type="password" name="old_mdp" required></p>
			<p>Nouveau Mot de passe<input type="password" name="mdp" required></p>
			<p>Vérifier le nouveau Mot de passe<input type="password" name="mdp2" required></p>
			<p><input type="submit" value="Changer Mot de passe"></p>
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
   			<p><input type="submit" value="Retour accueuil"></p>
		</form>
	</body>
</html>