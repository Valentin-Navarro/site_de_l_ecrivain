
<?php ob_start(); ?>
<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>
<div class="jumbotron mb-5">
  <h1 class="display-4"><?= $post->title ?></h1>
  <p class="lead">le <?= $post->creation_date_fr?></p>
  <hr class="my-4">
  <p><?= nl2br ($post->content)?></p>
</div>
<h4>Commentaires</h4>

<form action="index.php?action=addComment&amp;id=<?= $post->id ?>" method="post">
  <div class="form-group">
    <label for="author">Auteur</label>
    <input type="text" class="form-control" id="author" name="author" >
  </div>
  <div class="form-group">
    <label for="comment">Commentaire</label>
    <textarea class="form-control" id="comment" name="comment"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
</form>



<br /><br />

<?php foreach ($comments as $commentObject) { ?>


<div class="card mb-2">
  <div class="card-body">
    <h6 class="card-subtitle mb-2 text-muted"><?= $commentObject->author ?> : </h6>
    <p class="card-text"><?= $commentObject->comment ?></p>
    <div class= "text-right">
    <a href="index.php?action=signalComment&id=<?= $commentObject->id ?>" class="card-link text-right">Signaler</a>
    </div>
  </div>
</div>
<?php }?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>