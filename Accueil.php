<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>I-Car</title>
		<link rel="stylesheet" type="text/css" href="Accueil.css" />
	</head>
	<body>
		<div id= "conteneur">
			<div id="header">
				<img src="logo1.png">
			</div>

			<div id="info">  
				<?php
				$t = date("H");

				if ($t < "20") {
				  echo "<strong>Bonjour, bienvenue sur notre site !</strong>";
				} else {
				  echo "<strong>Bonsoir, bienvenue sur notre site !</strong>";
				}
				?>  
			</div>
 
			<div class="connexion">
			<form method="POST" action="Connexion.php" >
				<input type="submit" name="OUT" value="Espace client" class="button">
			</form>
			</div>
			<div id="inf">
				<img src="inf.png">
			</div>	
		</div>
		<a class="i" href="#" title="Voici quelques infos">i</a>
	<h2 style="text-align:center">Avec I-car, ce n'est plus le bazar</h2>
<p style="text-align:center">Ici, accédez facilement à votre espace client.</p>

<div class="profil">
	<div class="columns">
	  <ul class="price">
	    <li class="header">Profil 1</li>
	    <li class="grey">Force de l'ordre</li>
	    <li class="grey"><a class="button">Mon espace</a></li>
	  </ul>
	</div>

	<div class="columns">
	  <ul class="price">
	    <li class="header" style="background-color:#2e7d32">Profil 2</li>
	    <li class="grey">Assuré</li>
	    <li class="grey"><a class="button">Mon espace</a></li>
	  </ul>
	</div>

	<div class="columns">
	  <ul class="price">
	    <li class="header">Profil 3</li>
	    <li class="grey">Assureur</li>
	    <li class="grey"><a class="button">Mon espace</a></li>
	  </ul>
	</div>
</div>
	<div id="milieu">Les services de la plateforme :</br>
		Declaration de cession de véhicule</br>
		Declaration d'un sinistre</br>
		Descriptif du véhicule</br>
		Descriptif du conducteur</br>
		Descriptif d'un contrat en cours/futur</br>
		Constat à l'amiable</br>
		Carte verte</br>

	</div>
	<div id="dallas">
		Vous pouvez nous laisser un avis ici : (mettre un rectangle et un boutton submitt) </br>
		Vous pouvez également nous noter de 0 à 5 :
		<div class="rating"><!--
   --><a href="#5" title="Donner 5 étoiles">★</a><!--
   --><a href="#4" title="Donner 4 étoiles">★</a><!--
   --><a href="#3" title="Donner 3 étoiles">★</a><!--
   --><a href="#2" title="Donner 2 étoiles">★</a><!--
   --><a href="#1" title="Donner 1 étoile">★</a>
		</div>
	</div>
	<div id="bas">Nous contacter</br>
		Nos Réseaux Sociaux</br>
		Notre téléphone</br>
		Notre email</br> <img src="mail.png">
		Notre adresse</br>
	</div>
	<h3>Formulaire de contact</h3>

<div class="contact">
    <label for="fname">Nom</label>
    <input type="text" id="fname" name="firstname" placeholder="Votre nom">

    <label for="lname">Prénom</label>
    <input type="text" id="lname" name="lastname" placeholder="Votre prénom">

    <label for="country">Pays</label>
    <select id="country" name="country">
      <option value="australia">France</option>
      <option value="canada">Belgique</option>
      <option value="usa">Espagne</option>
      <option value="australia">USA</option>
      <option value="canada">Belgique</option>
      <option value="usa">Espagne</option>
    </select>

    <label for="subject">Commentaire</label>
    <textarea id="subject" name="subject" placeholder="Ecrivez nous.." style="height:200px"></textarea>

    <input type="submit" value="Envoyer">
</div>

</body>
</html>



	</body>
</html>

