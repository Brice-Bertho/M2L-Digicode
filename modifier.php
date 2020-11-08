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
  
	<div id="entete">
	<img src="images/logo.jpg">
	</div>
	
	<div id="menu">
		<?php include("menu.php"); ?>
	</div>
	
	<!-- exécution du script traitement.php après clic sur le bouton Valider-->
	<form action = "traitement.php" method = "post">
				
	<?php if ($_SESSION['level'] == 'admin') { ?>
	
	<?php 	$resultat = $cnx->query("select digicode from mrbs_parrametre;");
			$resultat->setFetchMode(PDO::FETCH_OBJ);
			$ligne=$resultat->fetch(PDO::FETCH_OBJ);
			$_SESSION['digicode'] = $ligne->digicode;
	?>
	
	<?php 	$resultat1 = $cnx->query("select id from mrbs_parrametre;");
			$resultat1->setFetchMode(PDO::FETCH_OBJ);
			$ligne1=$resultat1->fetch(PDO::FETCH_OBJ);
			$_SESSION['id'] = $ligne1->id;
	?>
	
	<?php $id = $_SESSION['id'] ; ?>
	
	<form>
		<div id="pagegestionD">
			<div style="clear:both"></div>
				<br><tr>Digicode actuel : <?php echo utf8_encode($ligne->digicode) ?></tr>
	
				<h3>Nouveau digicode</h3>
					<fieldset>
						<?php
						// Génération d'une digicode aléatoire
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
						<tr>
							<td>Entrez votre nouveau digicode :</td>
							<input name="digicode1" type="text" size ="6" min="6" required placeholder="Digicode"><br><br>
						</tr>
				
						<tr>
							<td>Confirmez votre nouveau digicode :</td>
								<input name="digicode2" type="digicode" size ="6" min="6" required placeholder="Digicode"><br>
						</tr>
				
						<tr>
							<br><input type="submit" name="cmdvalider" value="Valider">
						</tr>			
					</fieldset>
					</form>
			<div style="clear:both"></div>	
		</div>
	</form>
	<?php } else {?>
		<div id="pagegestionD">
			<div style="clear:both"></div>
				<br>Seul les administrateurs peuvent modifier le digicode
			<div style="clear:both"></div>		
		</div>
	<?php } ?>
</html>