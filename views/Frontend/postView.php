
<?php ob_start(); ?>
<h1>Blog de l'écrivain !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        le <?= $post['creation_date_fr'] ?>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>


<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" required />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="content" name="comment" required></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<br /><br />
<?php while ($comment = $comments->fetch()) { ?>
    <b><?=$comment['author'] ?>:</b><?=$comment['comment'] ?><br />

<?php }?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>