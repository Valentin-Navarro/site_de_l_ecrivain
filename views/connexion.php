<?php $title = 'Blog de l ecrivain '; ?>

<?php ob_start(); ?>
<html>
	<head>
		<title>Blog de l'écrivain</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div align="center">
			<h2>Connexion</h2>
			<br /><br />
			<form method="POST" action="index.php?action=traitementConnexion">
				<label for ="mail">Votre mail :</label>
				<input type ="email" name="mailconnect" placeholder="Mail"/><br />
				<label for ="password">Mot de Passe :</label>
				<input type ="password" name="mdpconnect" placeholder="Mot de Passe"/>
				<input type ="submit" name="formconnexion" placeholder="Se connecter"/>
			</form>
	</body>
</html>	
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
