<?php $title = 'Blog de l ecrivain '; ?>


<?php ob_start(); ?>
<?php 
    $etat = array_key_exists('pseudo',$_SESSION);

?>

<?php if ($etat == true) { ?> 
    <div align="left">
        <p> Bienvenue <?php echo $_SESSION['pseudo']; ?> </p> 
    </div> 
<?php }?>
    
    <h1 class = "text-center mb-5">Blog de l'écrivain !</h1>


    <?php foreach ($posts as $billet) { ?>
    <div class="card mb-4" >
  <div class="card-body">
    <h5 class="card-title"><?= $billet->title ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">le <?= $billet->creation_date_fr ?></h6>
    <p class="card-text"><?= nl2br($billet->content) ?></p>
    <div class= "text-right">
    <a href="index.php?action=post&id=<?= $billet->id ?>" class="card-link">Lire la suite</a>
    </div>
  </div>
</div>
    <?php } ?>

     <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
           <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>


    
    <br>
    <br>


<footer>
    <ul>
        <li><a href="index.php?action=FormAddArticle">Proposer un article </a></li>
        <?php if(empty($_SESSION['pseudo'])) { ?>
                <li><a  href="index.php?action=connexion"> Connexion</a></li>
        <?php } else { ?>
                <li><a class="btn btn-success my-2 my-sm-0" href="index.php?action=deconnexion"> Deconnexion</a></li>
    <?php } ?>
    </ul>
    
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
