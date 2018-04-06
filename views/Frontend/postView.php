
<?php ob_start(); ?>
<h1>Blog de l'écrivain !</h1>
<p><a href="index.php?action=accueil">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
    </h3>
    <h5>le <?= $post['creation_date_fr'] ?></h5>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>
<br>

<h4>Commentaires</h4>


<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <b><label for="author">Auteur</label><br /></b>
        <input type="text" id="author" name="author" required />
    </div>
    <div>
        <b><label for="comment">Commentaire</label><br /></b>
        <textarea id="content" name="comment" required></textarea>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
</form>

<br /><br />
<?php while ($comment = $comments->fetch()) { ?>
    <b><?=$comment['author'] ?>:</b><?=$comment['comment'] ?><br />

<?php }?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>