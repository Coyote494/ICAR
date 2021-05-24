function messagerie(){
	message = document.getElementById("mon_message").value;
	console.log("test");
	console.log(message);

	xhttp = new XMLHttpRequest();
	xhttp.open("POST", "./AJAX/ajout_message.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("message="+message);
}

function charger(){

    setTimeout( function(){
    	xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById("messages").innerHTML = this.responseText;
			}
		}
		xhttp.open("POST", "./AJAX/affichage_messages.php", true);
		xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhttp.send();

        charger();

    }, 10000);

}

charger();
