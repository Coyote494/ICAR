<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Accueil Assuré</title>
		<meta charset="utf-8">
	</head>
	<body>

		<!-- bouton de déconnexion -->
		<form method="POST" action="../deconnexion.php">
		    <input type="submit" name="OUT" value="Déconnexion"/>
		</form>

		<?php
			if (isset($_GET["change_mdp"]) && $_GET["change_mdp"] == "success") {
            	echo "<script>alert('Mot de passe modifié avec succès !');</script>" ;
			}   
		?>
		
        <p><a href='declarer_sinistre.php' class='lien'>Déclarer un sinistre</a></p>
        <p><a href='changement_coord.php' class='lien'>Déclarer un changement de coordonnées</a></p>
        <p><a href='historique_sinistres.php' class='lien'>Consulter l'historique des sinistres</a></p>
        <p><a href='declarer_vente.php' class='lien'>Déclarer de vente/cession</a></p>
        <div>Mes contrats</div>
        <div>Contact et infos</div>
    
	</body>
</html>