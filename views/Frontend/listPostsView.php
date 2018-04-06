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
    <div align="center">
        <h1>Blog de l'écrivain !</h1>
    </div>
    
    <h3>Derniers billets du blog :</h3>
    <br></br>


    <?php while ($data = $posts->fetch()) { ?>
   
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']) ?>
            </h3>
            <h6>    
                le <?= $data['creation_date_fr'] ?><br>
                <a href="index.php?action=post&id=<?= $data['id'] ?>">Lire la suite</a>
            </h6>

            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <br />
            </p>
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
                <li><a href ="index.php?action=formInscription">Inscription</a></li>
        <?php } else { ?>
                <li><a class="btn btn-success my-2 my-sm-0" href="index.php?action=deconnexion"> Deconnexion</a></li>
    <?php } ?>
    </ul>
    
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
