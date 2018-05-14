<?php $title = 'Blog de l ecrivain '; ?>


<?php ob_start(); ?>

<p> Bienvenue <?php echo $_SESSION['pseudo']; ?> </p>

   <h5 class="display-4 text-center mb-5">Commentaires à modérer </h5>
  <ul>
    <?php while ($comment = $comments->fetch()){ ?>
        <li>
            <?= $comment['id'] ?> : <?= $comment['author']?> : <?= $comment['comment'] ?> 
            <?php if ($comment['approuve'] == 0 ) { ?> 
                - <a href="index.php?action=approveComment&id=<?= $comment['id'] ?>">Commentaire Signalé</a>
            <?php } ?> 
            - <a href="index.php?action=deleteComment&idComment=<?= $comment['id'] ?>">Supprimer</a>
        </li>
    <?php } ?>  
  </ul>

   <h5 class="display-4 text-center mb-5">Liste des Articles </h5>
  <ul>
    <?php while ($billet = $posts->fetch()){ ?>
        <li>
            <?= $billet['id'] ?> : <?= $billet['title']?> 
            - <a href="index.php?action=editionArticle&id=<?= $billet['id'] ?>">Modifier l'article</a>
              <a href="index.php?action=deleteArticle&id=<?= $billet['id'] ?>">Supprimer l'article</a>
        </li>
    <?php } ?>  
  </ul>

  <br /><br />

  <?php $content = ob_get_clean(); ?>

<?php require('views/frontend/template.php'); ?>



