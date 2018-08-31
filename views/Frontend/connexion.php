<?php $title = 'Blog de l ecrivain '; ?>

<?php ob_start(); ?>

<h2>Connexion</h2>
			
<form class="py-3" method="POST" action="index.php?action=traitementConnexion">
	<div class="form-group">
		<label for="mail">Votre mail</label>
		<input type="email" class="form-control" id="mail" placeholder="email@example.com" name="mailconnect">
	</div>
	<div class="form-group">
		<label for="password">Mot de Passe</label>
		<input type="password" class="form-control" id="password" placeholder="Password" name="mdpconnect">
	</div>
	<button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
