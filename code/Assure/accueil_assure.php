<?php
	session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
	<head>
		<title>Accueil Assuré</title>
		<link rel="stylesheet" type="text/css" href="./CSS/accueil_assure.css" />

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
    <div id = contrats>
		<?php
			$Directory = "../../database/".$_SESSION["assurance"]."/".$_SESSION["nom"][0]."/".$_SESSION["nom"]."_".$_SESSION["prenom"]."/Contrats";
			$MyDirectory = opendir($Directory) or die('Erreur');
			 while(false != ($Entry = readdir($MyDirectory))) {
				 if(is_dir($Directory.'/'.$Entry)&& $Entry != '.' && $Entry != '..') {
					if($handle = fopen($Directory.'/'.$Entry.'/info_contrat.csv', "r")){
						$data = fgetcsv($handle, 1000, ",");
						fclose($handle);
					}
					echo "<div>";
					echo "<strong>Contrat ".$Entry[8]."</strong><br>";
					echo "<br>Marque :".$data[3];
					echo "<br>Modèle :".$data[4];
					echo "<br>Immatriculation :".$data[0];
					echo "<br>Kilomètrage :".$data[7];
					echo "</div>";
				}
			}
			closedir($MyDirectory);
		?>
		</div>
		<?php
			if (isset($_GET["change_mdp"]) && $_GET["change_mdp"] == "success") {
            	echo "<script>alert('Mot de passe modifié avec succès !');</script>" ;
			}   
		?>
    <!-- bouton de déconnexion -->
    <div id="deconnexion">
		<form method="POST" action="../deconnexion.php">
		    <input type="submit" name="OUT" value="Déconnexion" class="bouton" />
		</form>
	</div>
        <div id="messagerie">
        	<a href="messagerie.php">Accès messagerie</a>
        </div>
        <script type="text/javascript" src="./JS/accueil_assure.js"></script>
        <!-- <iframe src="messagerie.php" width="300" height="400"></iframe> -->
	</body>
</html>