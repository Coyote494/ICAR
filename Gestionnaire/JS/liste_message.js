function afficher_conversation(nom , prenom){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("conversation").innerHTML = this.responseText;		//on charge les messages via ajax
		}
	}
	xhttp.open("POST", "./AJAX/affichage_messages.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("nom="+nom+"&prenom="+prenom);
}

function retour_clients(){
    setTimeout( function(){										// on appelle la fonction toutes les 3 secondes
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

retour_clients();