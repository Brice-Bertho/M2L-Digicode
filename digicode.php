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
	</div>
	
	<div id="pagegestionD">
			
		<div style="clear:both"></div>
			<table>
			<tr>
				  <td>
				 
				  
					<?php $resultat = $cnx->query("SELECT digicode FROM mrbs_parrametre;");
					
						$resultat->setFetchMode(PDO::FETCH_OBJ);
						$resultat-> execute();
						
					
				
				
				// lecture de la première ligne du jeu d'enregistrements
				$ligne = $resultat->fetch(); 

				?>
					<p>Votre digicode est: </br><?php echo utf8_encode($ligne->digicode); $resultat->closeCursor();	?></p>
				  </td>
				 </tr>
				 <tr>
			 </tr>
			</table>
		<div style="clear:both"></div>
		
		<?php
		// Génération d'une chaine aléatoire
		function nouveauDigicode($chaine = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ')
			{
			$nb_lettres = strlen($chaine) - 1;
			$generation = '';
			for($i=0; $i < 7; $i++)
			{
				$pos = mt_rand(0, $nb_lettres);
				$car = $chaine[$pos];
				$generation += $car;
			}
			return $generation;
		}

		echo nouveauDigicode();
?>		
	</div>
   </body>
</html>