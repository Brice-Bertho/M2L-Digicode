<?php	
	session_start();
	include_once ('include/_inc_parametres.php');
	include_once ('include/_inc_connexion.php');

	$mdp1 = $_POST ["mdp1"];
	$mdp2 = $_POST ["mdp2"]; 
	$mdpActuel =$_SESSION ["mdp"];
	$nom = $_SESSION["nom"];
				
	if($mdp1 != $mdp2){
		echo "Les mots de passe saisis sont différents, vous allez être redirigé vers la saisie du mot de passe. ";
		header("Refresh:5 ; url = changementMdp.php");
	}
	
	if($mdpActuel == md5($mdp1)){
			echo "Le mot de passe saisi est identique à l'ancien mot de passe, vous allez être redirigé vers la saisie du mot de passe. ";
			header("Refresh:5 ; url = changementMdp.php");
	}
	
	if($mdp1 == $mdp2){
		echo" Mot de passe modifié. ";
		$resultat = $cnx->query("UPDATE mrbs_users SET password = MD5('$mdp1') where name = '$nom' ;");
		header("Refresh:5 ; url = changementMdp.php");
	}
	?>