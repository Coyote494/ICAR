<?php
	$existingPath = '../../database/';
	databaseCreation($_POST['nom'].'/', $existingPath);
	
	function databaseCreation($nom, $path){
		mkdir($path);
		mkdir($path.$nom);
	}
?>