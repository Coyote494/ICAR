<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Accueil Assuré</title>
		<link rel="stylesheet" type="text/css" href="accueil_assure.css" />

		<meta charset="utf-8">
	</head>
	<body>
		<div class="haut">
			<img src="../img/logo.png">
		<h1>Bienvenue sur votre page assuré</h1>
		</div>
		<div class="container">
			<div class="declarer_sinistre">
        		<a href='declarer_sinistre.php' class='lien'>Déclarer un sinistre</a>
    		</div>

       		 <div class="changement_coord">
        		<a href='changement_coord.php' class='lien'>Déclarer un changement de coordonnées</a>
   			</div>
   		<div class="historique_sinistres">
        	<a href='historique_sinistres.php' class='lien'>Consulter l'historique des sinistres</a>
        </div>
        <div class="declarer_vente">
        	<a href='declarer_vente.php' class='lien'>Déclaration de vente/cession</a></div>
    	</div>
    <!-- bouton de déconnexion -->
		<form method="POST" action="../deconnexion.php">
		    <input type="submit" name="OUT" value="Déconnexion" class="bouton" />
		</form>

		<?php
			if (isset($_GET["change_mdp"]) && $_GET["change_mdp"] == "success") {
            	echo "<script>alert('Mot de passe modifié avec succès !');</script>" ;
			}   
		?>
		
       <!--  <p><a href='declarer_sinistre.php' class='lien'>Déclarer un sinistre</a></p>
        <p><a href='changement_coord.php' class='lien'>Déclarer un changement de coordonnées</a></p>
        <p><a href='historique_sinistres.php' class='lien'>Consulter l'historique des sinistres</a></p>
        <p><a href='declarer_vente.php' class='lien'>Déclarer de vente/cession</a></p>
        <div>Mes contrats</div>
        <div>Contact et infos</div> -->
        <iframe src="messagerie.php" width="300" height="400"></iframe>
	</body>
</html>