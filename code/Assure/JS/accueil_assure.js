function messagerie(){
	message = document.getElementById("mon_message").value;		//on récupère le message écrit par l'utilisateur
	console.log(message);
	document.getElementById("mon_message").value = "";			//on remet la valeur du champ à 0

	xhttp = new XMLHttpRequest();								//on enregistre le message dans le fichier conversation via AJAX
	xhttp.open("POST", "./AJAX/ajout_message.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("message="+message);
}

function afficher_messagerie(){
	document.getElementById("messagerie").innerHTML = '<iframe src="messagerie.php" width="300" height="400"></iframe>';
}