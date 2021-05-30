<?php
session_start();
if (!isset($_SESSION["nom"])) {
    header("Location: Accueil.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Gestionnaire</title>
	</head>
	<body>
		<div>
			<div>
				I - CAR
			</div>
			<div>
				<a href="rechercherContrat.php">Rechercher un contract</a>
				<p>En recherchant un client vous pouvez consulter ses sinistres ainsi que tout ses autres documents</p>
			</div>
			<div>
				<a href="nouveauContrat.php">Nouveau contract</a>
			</div>
			<div>
				Gérer les demandes
				<a href="changementCoordonees.php">changement de coordonées<a>
				<a href="#">cession d'un véhicule<a>
				<a href="#">sinistres<a>
				<a href="signaler.php">signaler un problème<a>
			</div>
		</div>
			<!-- bouton de déconnexion -->
		<form method="POST" action="../deconnexion.php">
			<input type="submit" name="OUT" value="Déconnexion" class="bouton"/>
		 </form>
		 <iframe src="liste_message.php" width="300" height="400"></iframe>
	</body>
</html>