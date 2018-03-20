<?php $title = 'Blog de l ecrivain '; ?>

<?php ob_start(); ?>
    
    <h1>Blog de l'écrivain !</h1>
        
	<form method="post" action="index.php?action=addArticle">
		<table>
			<tr>
				<td>
					<p>
						<label for ="author"> Votre pseudo </label> :<input type="text" name="author" id="author" required />
						<br>
						<label for ="email"> Votre email </label> :<input type="email" name="email" id="email" required />
					</p>

					<p>

					<label for ="title"> Titre </label> :<input type="titre" name="title" id="title" required /></br>
					<label for ="content">Message </label>
					<textarea name="content" id="content" required></textarea>
					</p>
				</td>	
			</tr>
		</table>	

		<input type="submit" value="Envoyer"/>

	</form>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
