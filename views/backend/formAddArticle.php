<?php $title = 'Blog de l ecrivain '; ?>

<?php ob_start(); ?>
    
    <h1>Blog de l'écrivain !</h1>

			<form method="post" action="index.php?action=addArticle">
				<table>
					<tr>
						<td>
							<p>
							<label for ="title"> Titre </label> :<input type="titre" name="title" id="title" required /></br>
							<label for ="content">Message </label>
							<textarea class="tinymce" name="content" id="content" required></textarea>
							</p>
						</td>	
					</tr>
				</table>	

				<input type="submit" class="btn btn-success my-2 my-sm-0"value="Envoyer"/>

			</form>	



<?php $content = ob_get_clean(); ?>

<?php require('views/frontend/template.php'); ?>
