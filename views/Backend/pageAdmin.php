<?php $title = 'Blog de l ecrivain '; ?>


<?php ob_start(); ?>

<p> Bienvenue <?php echo $_SESSION['pseudo']; ?> </p>

  <h3> Commentaires à Approuver </h3>
  <ul>
    <?php while ($comment = $comments->fetch()){ ?>
        <li>
            <?= $comment['id'] ?> : <?= $comment['author']?> : <?= $comment['comment'] ?> 
            <?php if ($comment['approuve'] == 0) { ?> 
                - <a href="index.php?action=approveComment&id=<?= $comment['id'] ?>">Approuver</a>
            <?php } ?> 
            - <a href="index.php?action=deleteComment&id=<?= $comment['id'] ?>">Supprimer</a>
        </li>
    <?php } ?>  
  </ul>
  <br /><br />

  <?php $content = ob_get_clean(); ?>

<?php require('views/frontend/template.php'); ?>


// afficher un formulaire avec les commentaires , et bouton destroy 