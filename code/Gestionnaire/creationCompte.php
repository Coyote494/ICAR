<?php
session_start();

$n = 10;
$tab = postAttributions($n);
$path = "../../database/Allianz"/*.$_SESSION['assurance']*/."/".strtoupper(substr($tab[0],0,1))."/";
principal($path, $tab);

function principal($path, $tab){
	if(file_exists($path.$tab[0]."_".$tab[1]."/coordonnees.csv")){
		add($path, $tab);
	}else{
		create($tab, $path);
		sendMail($tab);
	}
	header('Location: nouveauContrat.php');
	exit();
}

function getRandomString($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    } 
    return $randomString;
}

function postAttributions($n){
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$genre = $_POST["genre"];
	$dob = $_POST["dob"];
	$job = $_POST["job"];
	$adresse = $_POST["adresse"];
	$code = $_POST["codePostal"];
	$ville = $_POST["ville"];
	$tel = $_POST["numero"];
	$email = $_POST["mail"];
	$numContrat = $_POST["numContrat"];
	$id = $nom.$prenom;
	$mdp = getRandomString($n);
	$tab = array($nom, $prenom, $id, $mdp, $genre, $dob, $job, $adresse, $code, $ville, $tel, $email, $numContrat);
	return($tab);
}

function add($path, $tab){
	if ($f = fopen($path.$tab[0]."_".$tab[1]."/coordonnees.csv", "r")){
		$data = fgetcsv($f);
		fclose($f);
	}
	array_push($data, $tab[12]);
	if($f = fopen($path.$tab[0]."_".$tab[1]."/coordonnees.csv", "w")){
		fputcsv($f, $data, ",");
		fclose($f);
	}
}

function create($tab, $path){
	mkdir($path);
	mkdir($path.$tab[0]."_".$tab[1]);
	mkdir($path.$tab[0]."_".$tab[1]."/Contrats/");
	mkdir($path.$tab[0]."_".$tab[1]."/Documents/");
	mkdir($path.$tab[0]."_".$tab[1]."/Sinistres/");
	mkdir($path.$tab[0]."_".$tab[1]."/Justificatifs/");
	if($f = fopen($path.$tab[0]."_".$tab[1]."/coordonnees.csv", "c+")){
		fputcsv($f, $tab);
		fclose($f);
	}
}

function sendMail($tab){
	$subject = 'Votre mot de passe I-car';
	$message = 'Votre mot de passe temporaire est'.$tab[3].' \n';
	$message .= 'Votre identifiant est'.$tab[2].' \n';
	$message .= 'Veuillez changer votre mot de passe dès votre première connexion sur I-car \n';
	mail($tab[11], $subject, $message);
}

?>