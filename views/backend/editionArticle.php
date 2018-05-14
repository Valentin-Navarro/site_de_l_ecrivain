<?php $title = 'Blog de l ecrivain '; ?>


<?php ob_start(); ?>

<p> Bienvenue <?php echo $_SESSION['pseudo']; ?> </p>

<form method="post" action="index.php?action=majArticle&id=<?= $billet['id'] ?>">    
	<input type="hidden" name="idB" value="<?= $billet['id']?>"/>
    <div class="jumbotron jumbotron-fluid mb-5">
  	<div class="container">
    <h1 class="display-4 text-center mb-5">Edition  </h1>
    <h3 class="display-9 text-left mb-3"> Titre:<input type="titre" name="title" id="title" value="<?= $billet['title']?> "></h3>
    <textarea class="tinymce" name="content" id="content"><?= $billet['content'] ?></textarea>
    <input type="submit" class="btn btn-success my-2 my-sm-0"value="Envoyer"/>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('views/frontend/template.php'); ?>
