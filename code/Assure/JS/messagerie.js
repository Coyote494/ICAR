function charger(){

    setTimeout( function(){										// on appelle la fonction toutes les 3 secondes
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

}

charger();