function charger(){

    var t = setTimeout( function(){										// on appelle la fonction toutes les 3 secondes
    	xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("logs").innerHTML = this.responseText;		//on charge les messages via ajax
			}
		}
		xhttp.open("POST", "./AJAX/affichage_logs.php", true);
		xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhttp.send();

        charger();

    }, 10000);
}

charger();