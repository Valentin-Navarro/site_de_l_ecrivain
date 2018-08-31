<?php $title = 'Blog de l ecrivain '; ?>

<?php ob_start(); ?>
<div>
	<h1>Blog de l'écrivain !</h1>


	<form method="post" action="index.php?action=addArticle">    
		<div class="jumbotron jumbotron-fluid mb-5">
			<div class="container">
				<h1 class="display-4 text-center mb-5">Nouvel Article </h1>
				<h3 class="display-9 text-left mb-3"> Titre:<input type="titre" name="title" id="title" required /></h3>
				<p class="tinymce" name="content" id="content" required></p>
				<input type="submit" class="btn btn-success my-2 my-sm-0"value="Envoyer"/>
			</div>
		</div>
	</form>	
</div>

<?php $content = ob_get_clean(); ?>

<?php require('views/frontend/template.php'); ?>
