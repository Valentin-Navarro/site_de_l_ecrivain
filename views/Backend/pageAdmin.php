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
            - <a href="index.php?action=deleteComment&idComment=<?= $comment['id'] ?>">Supprimer</a>
        </li>
    <?php } ?>  
  </ul>
  <br /><br />


  <h3>Edition Article </h3>

<!-- // travailler avec un php while pour recuperer la liste des articles et creer requete sql pour UPDATE  -->

  <?php $content = ob_get_clean(); ?>

<?php require('views/frontend/template.php'); ?>



 <!-- afficher un formulaire avec les commentaires , et bouton destroy  -->