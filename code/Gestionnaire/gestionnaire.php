<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Gestionnaire</title>
		<link rel="stylesheet" type="text/css" href="./CSS/gestionnaire.css" />
	</head>
	<body>
	<div class="bandeau"> 
		<img src="../img/logo.png">
        <h2>Bienvenue sur votre page gestionnaire</h2>
    </div>

    <div class="voiture-rtl">
        <div><img src="img/voiture.png"></div>
    </div>
    <div class="container">
    		<div class="contrat">
				<a href="rechercherContrat.php">Rechercher un contract</a>
				<p>En recherchant un client vous pouvez consulter ses sinistres ainsi que tous ses autres documents</p>
			</div>
			<div class="nouveauContrat">
				<p> Créer un nouveau contrat</p>
				<a href="nouveauContrat.php">Nouveau contrat</a>
			</div>
			<div class="gerer">
				<p>Gérer les demandes</p>
				<a href="changementCoordonees.php">Changement de coordonnées</a></br></br>
				<a href="supprimer.php">Cession d'un véhicule</a></br></br>
				<a href="#">Sinistres</a></br></br>
				<a href="signaler.php">Signaler un problème</a></br>
			</div>
	</div>
			<div class="liste_message">
			<p>Consultez vos messages</p>
		 <iframe src="liste_message.php" width="300" height="400"></iframe>
		</div>
	

			<!-- bouton de déconnexion -->
			<div class="deconnexion">
		<form method="POST" action="../deconnexion.php">
			<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
		 </form>

	</body>
</html>