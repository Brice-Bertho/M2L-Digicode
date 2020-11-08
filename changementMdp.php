<?php 
	// cette instruction doit toujours être la première ligne du code pour fonctionner!!!!!!!!!!!!!
	session_start();
	// inclusion des paramètres et de la bibliothéque de fonctions ("include_once" peut être remplacé par "require_once")
	include_once ('include/_inc_parametres.php');
    // connexion du serveur web à la base MySQL ("include_once" peut être remplacé par "require_once")
	include_once ('include/_inc_connexion.php');
?>

<!DOCTYPE HTML> 
<html lang="fr">
	   
  <head>
    <title>Maison des Ligues</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="./styles/style.css" rel="stylesheet" type="text/css" />
  </head>
  
  <body>
	<div id="entete">
	<img src="images/logo.jpg">
	</div>

	<div id="menu">
		<?php include("menu.php"); ?>
	</div><br><br><br><br>

	<!-- exécution du script traitement.php après clic sur le bouton Valider-->
	<form action = "traitementMdp.php" method = "post">
		<div id="pagegestionD">
				<div style="clear:both"></div>
					Nom : <?php echo $_SESSION['nom']; ?>
					<?php $nom = $_SESSION['nom'] ; ?>
	
					<?php 	$resultat = $cnx->query("select password from mrbs_users where name LIKE '$nom' ;");
					$resultat->setFetchMode(PDO::FETCH_OBJ);
					$ligne=$resultat->fetch(PDO::FETCH_OBJ);
					$_SESSION['mdp'] = $ligne->password ;?>
	
					<?php $mdpActuel = $_SESSION['mdp'] ?>
	
					<br>Mot de passe actuel : <?php echo utf8_decode($ligne->password) ?>
	
					<h3>Nouveau mot de passe</h3>
						<fieldset>
							<td>
								<tr>
									<td>Entrez votre nouveau mot de passe :</td>
										<input name="mdp1" type="password" size ="20" min="8" required placeholder="Mot de passe"><br><br>
								</tr>
				
								<tr>
									<td>Confirmez votre nouveau mot de passe :</td>
										<input name="mdp2" type="password" size ="20" min="8" required placeholder="Mot de passe"><br>
								</tr>
				
								<tr>
									<br><input type="submit" name="cmdvalider" value="Valider">
								</tr>
							</body>			
						</fieldset>
				<div style="clear:both"></div>		
		</div>
</html>

		