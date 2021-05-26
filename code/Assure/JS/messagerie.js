function messagerie(){
	message = document.getElementById("mon_message").value;		//on récupère le message écrit par l'utilisateur
	console.log(message);
	document.getElementById("mon_message").value = "";			//on remet la valeur du champ à 0

	xhttp = new XMLHttpRequest();								//on enregistre le message dans le fichier conversation via AJAX
	xhttp.open("POST", "./AJAX/ajout_message.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("message="+message);
}

function charger(){

    var t = setTimeout( function(){										// on appelle la fonction toutes les 3 secondes
    	xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("messages").innerHTML = this.responseText;		//on charge les messages via ajax
			}
		}
		xhttp.open("POST", "./AJAX/affichage_messages.php", true);
		xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhttp.send();

        charger();

    }, 3000);
	clearTimeout(t);
}

charger();