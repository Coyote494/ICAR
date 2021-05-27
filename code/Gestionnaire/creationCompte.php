<?php
	session_start();
	$_SESSION["assurance"] = "Allianz";
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
		QRcode::png($lien, $path.$tab[0].'_'.$tab[1].'/Contrats/contrat_'.$taille.'/qrcode.png');
		ajout_upload("CA",$path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_".$taille."/","contrat_assurance");
		ajout_upload("CG",$path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_".$taille."/","carte_grise");
		ajout_upload("CV",$path.$tab[0]."_".$tab[1]."/"."Contrats/contrat_".$taille."/","carte_verte");
		ajout_upload("permis",$path.$tab[0]."_".$tab[1]."/"."Documents/","permis");
		ajout_upload("justificatif",$path.$tab[0]."_".$tab[1]."/"."Justificatifs/","justificatif");
	}
	if (($handle = fopen($path.$tab[0]."_".$tab[1]."/"."coordonnees.csv", 'r'))) {
		$data = fgetcsv($handle, 1000, ",");
		fclose($handle);
	}
	array_push($data, $tab[12]);
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
}

?>