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
				<img src="./img/logo1.png">
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
				</br> Avec I-car, ce n'est plus le bazar</br>
				 Ici, accédez facilement à votre espace client.

			</div>
 
			<div class="connexion">
			<form method="POST" action="Connexion.php" >
			<button class="button">Espace client</button>
			</form>
			</div>

			<div class="inf">
				<img src="./img/inf.png">
				<span class="inftext">texte</span>
			</div>	
		</div>
	<div class="covid-rtl">
        <h3>ATTENTION : En raison de la situation sanitaire actuelle, nous privilégions les demandes et retours par mail.</h3>
        <div><img src="img/virus.png"></div>
    </div>

<div class="reseau">
	<div><a href="https://www.facebook.com"><img src="./img/facebook.png"> </a></div>
	<div><a href="https://www.instagram.com"><img src="./img/insta.jpeg"></a></div>
	<div><a href="https://www.linkedin.com"><img src="./img/ld.png"></a></div>
	<div><a href="https://twitter.com"><img src="./img/twitter.png"></a></div>
</div>
	<div class="milieu">
		<img src="./img/fond.png"> </a>

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
	<div class="bas">
    <h1>Nous contacter</h1>
	 <div class="contact">
		<h1>Nos contacts</h1>
		<p><img src="./img/tel.png" hspace="5"></p> <p>Notre téléphone : 06 40 90 54 32</p>
		<p><img src="./img/mail.png" hspace="5" ></p> <p>Notre email : Icar.assu@gmail.com</p> 
		<p><img src="./img/maison.png" hspace="5"></p> <p>Notre adresse : 2 avenue Lafayette 33000 Bordeaux</p>
	</div>


	<div class="formulaire">
	<h3>Formulaire de contact</h3>
 	<p>Nom <input type="text" name="id"  placeholder="Votre nom" required> </p> 
	<p>Prénom<input type="text" name="id"  placeholder="Votre prénom" required> </p> 


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
    <input type="text" name="subject" placeholder="Ecrivez nous..">

    <input type="submit" value="Envoyer">
</div>
</div>


</body>
</html>

