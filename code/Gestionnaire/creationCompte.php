<?php
	session_start();
	if (!isset($_SESSION["nom"])) {
		header("Location: ../Accueil.php");
		exit();
	}
?>
<?php
include('../phpqrcode/qrlib.php'); //On inclut la librairie pour le qr code
$n = 10;
$tab = postAttributions($n);
$path = "../../database/".$_SESSION['assurance']."/".strtoupper(substr($tab[0],0,1))."/";
principal($path, $tab);


function ajout_upload($name_upload, $chemin, $name_fichier){
	if ($_FILES[$name_upload]['error']  > 0 ) {
		header('Location: ./nouveauContrat.php?upload=echec');
		exit();
	} else{
		//on déplace le fichier uploadé des fichiers temporaires dans son dossier de stockage
		// et on vérifie que l'opéation s'est bien passé
		$extension = explode('.', $_FILES[$name_upload]['name']) ; //on enregistre le fichier sous la bonne extension
		$n = count($extension);
		$i = 0;
		$verif = 1;
		//comme on peut ajouter plusieurs justificatifs il faut tous les garder en mémoire
		while($verif){
			if(file_exists($chemin.$name_fichier.$i.".".$extension[$n-1])){
				$i++;
			}else{
				$verif = 0;
			}
		}
		  $res = move_uploaded_file( 
			$_FILES[$name_upload]['tmp_name'], 
			$chemin.$name_fichier.$i.".".$extension[$n-1]);
	}
}


function principal($path, $tab){
	if(file_exists($path.$tab[0]."_".$tab[1]."/"."coordonnees.csv")){
		add($path, $tab);
		if (($handle = fopen("../../database/logs.csv", "a"))) {	
    		date_default_timezone_set('Europe/Paris');
			$donnes = array(date('d-m-y h:i:s'), "Le gestionnaire ".$_SESSION["nom"]." ".$_SESSION["prenom"]." a ajouté un nouveau contrat au nom de ".$_POST["nom"]." ".$_POST["prenom"]."0");
			fputcsv($handle, $donnes, ',');
			fclose($handle);
		} 
	}else{
		create($tab, $path);
		if (($handle = fopen("../../database/logs.csv", "a"))) {	
    		date_default_timezone_set('Europe/Paris');
			$donnes = array(date('d-m-y h:i:s'), "Le gestionnaire ".$_SESSION["nom"]." ".$_SESSION["prenom"]." a ajouté un nouveau contrat au nom de ".$_POST["nom"]." ".$_POST["prenom"]."0");
			fputcsv($handle, $donnes, ',');
			fclose($handle);
		}
			mail($tab[11], "Bienvenue sur Icar", "Votre mot de passe est le suivant : ".$tab[3].'\n identifiant: '.$tab[2].'\n');
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
	$id = $_POST["mail"];
	$mdp = getRandomString($n);
	$tab = array($nom, $prenom, $id, $mdp, $genre, $dob, $job, $adresse, $code, $ville, $tel, $email, $numContrat);
	return($tab);
}

function add($path, $tab){
	if($handle = fopen($path.$tab[0]."_".$tab[1]."/"."coordonnees.csv", "r")){
		$data = fgetcsv($handle, 1000, ",");
		$taille = count($data) -11;
		fclose($handle);
	}
	$lien='http://localhost/icar/code/Visiteur/visiteur.php?nom='.$tab[0].'&prenom='.$tab[1].'&assurance='.$_SESSION["assurance"].'&contrat='.$taille; // Vous pouvez modifier le lien selon vos besoins
	if(mkdir($path.$tab[0].'_'.$tab[1].'/Contrats/contrat_'.$taille)) {
		ajout_upload("CA",$path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_".$taille."/","contrat_assurance");
		ajout_upload("CG",$path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_".$taille."/","carte_grise");
		ajout_upload("CV",$path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_".$taille."/","carte_verte");
		ajout_upload("permis",$path.$tab[0]."_".$tab[1]."/"."Documents/","permis");
		ajout_upload("justificatif",$path.$tab[0]."_".$tab[1]."/"."Justificatifs/","justificatif");
	}
	QRcode::png($lien, $path.$tab[0].'_'.$tab[1].'/Contrats/contrat_'.$taille.'/qrcode.png');
	$valeur[0] = $_POST["A"];
	$valeur[1] = $_POST["E"];
	$valeur[2] = $_POST["date_first_immat"];
	$valeur[3] = $_POST["D1"];
	$valeur[4] = $_POST["D2"];
	$valeur[5] = $_POST["J1"];
	$valeur[6] = $_POST["D3"];
	$valeur[7] = $_POST["kilometre"];

	if($handle = fopen($path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_".$taille."/info_contrat.csv", "w")){
		fputcsv($handle, $valeur, ",");
		fclose($handle);
	}
	//array_push($data, $tab[12]);
	$data[count($data)] = $tab[12];
	if (($handle = fopen($path.$tab[0]."_".$tab[1]."/"."coordonnees.csv", 'w'))) {
		fputcsv($handle, $data, ",");
		fclose($handle);
	}
}

function create($tab, $path){
	mkdir($path);
	mkdir($path.$tab[0]."_".$tab[1]."/");
	mkdir($path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_1/", 0777, true);
	mkdir($path.$tab[0]."_".$tab[1]."/"."Documents/");
	mkdir($path.$tab[0]."_".$tab[1]."/"."Sinistres/");
	mkdir($path.$tab[0]."_".$tab[1]."/"."Justificatifs/");
	$f = fopen($path.$tab[0]."_".$tab[1]."/coordonnees.csv", "c+");
	fputcsv($f, $tab, ",", '"', "");
	fclose($f);
	ajout_upload("CA",$path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_1/","contrat_assurance");
	ajout_upload("CG",$path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_1/","carte_grise");
	ajout_upload("CV",$path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_1/","carte_verte");
	ajout_upload("permis",$path.$tab[0]."_".$tab[1]."/"."Documents/","permis");
	ajout_upload("justificatif",$path.$tab[0]."_".$tab[1]."/"."Justificatifs/","justificatif");

	$valeur[0] = $_POST["A"];
	$valeur[1] = $_POST["E"];
	$valeur[2] = $_POST["date_first_immat"];
	$valeur[3] = $_POST["D1"];
	$valeur[4] = $_POST["D2"];
	$valeur[5] = $_POST["J1"];
	$valeur[6] = $_POST["D3"];
	$valeur[7] = $_POST["kilometre"];

	if($handle = fopen($path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_1/info_contrat.csv", "w")){
		fputcsv($handle, $valeur, ",");
		fclose($handle);
	}

	if($handle = fopen("../../database/".$_SESSION["assurance"]."/liste_clients.csv", "a")){
		$data = array($tab[0], $tab[1], $tab[2], $tab[3], $tab[10], $tab[11], $tab[12]);
		fputcsv($handle, $data, ",");
		fclose($handle);
	}	
}

?>