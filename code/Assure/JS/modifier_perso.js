function modifier_perso(){
	civilite = document.getElementById("civilite").value;
    prenom = document.getElementById("prenom").value;
    nom = document.getElementById("nom").value;
    date = document.getElementById("date").value;
    profession = document.getElementById("profession").value;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("coord_perso").innerHTML = this.responseText;
		}
	}
	xhttp.open("POST", "./AJAX/modifier_perso.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("nom="+nom+"&prenom="+prenom+"&date="+date+"&civilite="+civilite+"&profession="+profession);
}
/*
function modifier_coord(){
	civilite = document.getElementById("civilite").value;
    prenom = document.getElementById("prenom").value;
    nom = document.getElementById("nom").value;
    date = document.getElementById("date").value;
    profession = document.getElementById("profession").value;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("coord_perso").innerHTML = this.responseText;
		}
	};
	xhttp.open("POST", "/icar/code/Assure/AJAX/modifier_coord.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("nom="+nom+"&prenom="+prenom+"&date="+date+"&civilite="+civilite+"&profession="+profession);
}*/

function modifier_donnees(){
	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("donnees").innerHTML = this.responseText;
		}
	};
	xhttp.open("POST", "./AJAX/modifier_donnees.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send();
}
/*
function valider_donnees(){
	adresse = document.getElementById("adresse").value;
    code = document.getElementById("code").value;
    ville = document.getElementById("ville").value;
    telephone = document.getElementById("telephone").value;
    mail = document.getElementById("mail").value;

	xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("donnees").innerHTML = this.responseText;
		}
	};
	xhttp.open("POST", "/icar/code/Assure/AJAX/valider_donnees.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("adresse="+adresse+"&ville="+ville+"&code="+code+"&telephone="+telephone+"&mail="+mail);
}*/