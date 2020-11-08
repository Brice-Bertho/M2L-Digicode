<?php
	/* ouverture d'une session */
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
    <link rel="icon" href="images/icone.png" />
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
		<form action="envoiMail.php" method="post">
		<h2>Envoyer un mail</h2>
			<table>
				<tbody>
					<tr>
						<td>Destinataire(s) : </td>
						<td>
							<select name="destEmail[]" multiple required>
								<?php
								$resultat=$cnx->query("SELECT email FROM mrbs_users ORDER BY email");
								$resultat->setFetchMode(PDO::FETCH_ASSOC);
								foreach ($resultat as $data)
								{?>
									<option><?php echo $data['email']?></option>;
									<?php
								}?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Objet : </td>
						<td>
							<input name="objet" type="text" size ="30" min="0" required >
						</td>
					</tr>
					<tr>
						<td>Votre message : </td>
						<td>
							<textarea name="txt" type="text" min="0" cols="32" rows="4" required>
							</textarea>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" value="Envoyer">
							<input type="reset" value="Annuler">
						</td>
					</tr>
				</tbody>
			</table>
		</form>
</html>