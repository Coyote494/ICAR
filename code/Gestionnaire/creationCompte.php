<?php
	session_start();
?>
<?php
include('phpqrcode/qrlib.php'); //On inclut la librairie pour le qr code
$n = 10;
$tab = postAttributions();
$path = "../../database/".$_SESSION['assurance']."/".strtoupper(substr($nom,0,1))."/".$nom."_".$prenom."/";
principal($path, $tab);

function principal($path, $tab){
	if(file_exists($path."coordonnees.csv")){
		add($path, $tab);
	}else{
		create($tab, $path);
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

function postAttributions(){
	$nom = $_POST["nom"];
	$prenom = $_POST["prenom"];
	$genre = $_POST["genre"];
	$dob = $_POST["dob"];
	$job = $_POST["job"];
	$adresse = $_POST["adresse"];
	$code = $_POST["codePostal"];
	$ville = $_POST["ville"];
	$tel = $_POST["numero"];
	$email = $_POST["email"];
	$numContrat = $_POST["numContrat"];
	$id = $_POST["email"];
	$mdp = getRandomString($n);
	$tab = array($nom, $prenom, $id, $mdp, $genre, $dob, $job, $adresse, $code, $ville, $tel, $email, $numContrat);
	return($tab)
}

function add($path, $tab){
	$lien='http://localhost:8888/htdocs/icar/code/Visiteur/visiteur.php?nom='.$tab[0].'&prenom='.$tab[1].'&assurance='.$_SESSION["assurance"]; // Vous pouvez modifier le lien selon vos besoins
	if($handle = fopen($path."coordonnees.csv", "r")){
		$data = fgetcsv($handle, 1000, ",");
		$taille = count($data);
		fclose($handle);
	}
	if(mkdir('../../../database/'.$_SESSION["assurance"].'/'.$tab[0][0].'/'.$tab[0].'_'.$tab[1].'/Contrats/contrat_'.$taille-12){
		QRcode::png($lien, '../../../database/'.$_SESSION["assurance"].'/'.$tab[0][0].'/'.$tab[0].'_'.$tab[1].'/Contrats/contrat_'.$taille-12.'/qrcode.png', "H"); // On crée notre QR Code
	}
	
	$f = fopen($path."coordonnees.csv", "a+");
	fwrite($f, ",".$_POST["numContrat"]);
	fclose($f);
}

function create($tab, $path){
	mkdir($path);
	mkdir($path."Contrats/contrat_1/", 0777, true);
	mkdir($path."Documents/");
	mkdir($path."Sinistres/");
	$f = fopen($path."coordonnees.csv", "c+");
	fputcsv($f, $tab, ",", '"', "");
	fclose($f);
}

?>