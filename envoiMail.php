<!DOCTYPE HTML> 
<!-- le naviagateur utilisera les règles d'écriture de la DTD selon le standard W3C -->

<html lang="fr">
	<head>
		<title>Envoi mail</title>
		<!-- encodage du document en iso-8859-1 ou UTF-8 Voir format dans la barre d'outils-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- ligne ci-dessous à commenter-->
		<link rel="stylesheet" href="styles/style.css">
		<link rel="icon" href="images/icone.png" />
	</head>

	<body>
		<?php
			include ("include/Outils.class.php");
			$destinataire = $_POST['destEmail'];
			$objet = $_POST['objet'];
			$message = $_POST['txt'];
			foreach($destinataire as $dest) {
				Outils::envoyerMail ($dest, $objet, $message,"delasalle.sio.leleu.c@gmail.com") ;
			}
		header("Refresh:5; url=contact.php");
		?>
	</body>
</html>
