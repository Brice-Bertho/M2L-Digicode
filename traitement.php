<?php 	
	session_start();
	include_once ('include/_inc_parametres.php');
	include_once ('include/_inc_connexion.php');
	
	$digicode1 = $_POST ["digicode1"];
	$digicode2 = $_POST ["digicode2"];
	$digicodeActuel = $_SESSION['digicode'];
	$id = $_SESSION['id'];
	
	if($digicodeActuel == $digicode1){
		echo "Le digicode saisi est identique à l'ancien digicode, vous allez être redirigé vers la saisie du digicode. ";
		header("Refresh:5 ; url = modifier.php");
	}
	
	if($digicode1 != $digicode2){
		echo "Les digicodes saisis sont différents, vous allez être redirigé vers la saisie du digicode. ";
		header("Refresh:5 ; url = modifier.php");
	}
	
	if($digicode1 == $digicode2){
		echo" Digicode modifié. ";
		$resultat = $cnx->query("UPDATE mrbs_parrametre SET digicode = '$digicode1' where id ='$id' ;");
		header("Refresh:5 ; url = modifier.php");
	}
	?>