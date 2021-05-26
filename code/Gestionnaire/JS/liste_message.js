function afficher_conversation_r(nom , prenom){
	console.log("test1");
	if(typeof(v) != "undefined"){
		clearTimeout(v);
	}

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("saisie").innerHTML = this.responseText;		//on charge les messages via ajax
		}
	}
	xhttp.open("POST", "./AJAX/affichage_saisie.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send();

	afficher_conversation(nom,prenom);
}

function afficher_conversation(nom , prenom){
	console.log("test2");
	v = setTimeout(function(){

		xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("conversation").innerHTML = this.responseText;		//on charge les messages via ajax
			}
		}
		xhttp.open("POST", "./AJAX/affichage_messages.php", true);
		xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhttp.send("nom="+nom+"&prenom="+prenom);

		afficher_conversation(nom,prenom);

	}, 3000);
}

function retour_clients(){
    t = setTimeout( function(){										// on appelle la fonction toutes les 3 secondes
    	xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("liste_message").innerHTML = this.responseText;		//on charge les messages via ajax
			}
		}
		xhttp.open("POST", "./AJAX/retour_clients.php", true);
		xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhttp.send();

        retour_clients();

    }, 3000);
}

function messagerie(){
	nom = document.getElementById("nom").innerHTML;
	prenom = document.getElementById("prenom").innerHTML;
	message = document.getElementById("mon_message").value;		//on récupère le message écrit par l'utilisateur
	document.getElementById("mon_message").value = "";			//on remet la valeur du champ à 0

	xhttp = new XMLHttpRequest();								//on enregistre le message dans le fichier conversation via AJAX
	xhttp.open("POST", "./AJAX/ajout_message.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("message="+message+"&nom="+nom+"&prenom="+prenom);
}

retour_clients();