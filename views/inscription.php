<?php $title = 'Blog de l ecrivain '; ?>

<?php ob_start(); ?>

	<h2>Inscription</h2>
	<br /><br />
	<form method="POST" action="index.php?action=validInscription">
		<table>
			<tr>
				<td align="right">
					<label for ="pseudo">Pseudo :</label>
				</td>
				<td>
		    		<input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value ="<?php if(isset($pseudo)) {echo $pseudo; } ?>" />
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for ="mail">Mail :</label>
				</td>
				<td>
		    		<input type="email" placeholder="Votre mail" id="mail" name="mail"  value ="<?php if(isset($mail)) {echo $mail; } ?>" />
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for ="mail2">Confirmation du Mail:</label>
				</td>
				<td>
		    		<input type="email" placeholder="Confirmation du Mail" id="mail2" name="mail2"  value ="<?php if(isset($mail2)) {echo $mail2; } ?>" />
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for ="mdp">Mot de passe :</label>
				</td>
				<td>
		    		<input type="password" placeholder="Tapez votre mot de passe" id="mdp" name="mdp" />
				</td>
			</tr>
			<tr>
				<td align="right">
					<label for ="mdp2">Confirmation du Mot de Passe :</label>
				</td>
				<td>
		    		<input type="password" placeholder="Confirmer votre mot de passe" id="mdp2" name="mdp2" />
				</td>
			</tr>

		</table>	
			<br />
			<input type="submit" name="forminscription" value="Je m'inscris"/>	
	</form>	
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
