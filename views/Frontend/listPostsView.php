<?php $title = 'Blog de l ecrivain '; ?>


<?php ob_start(); ?>
<?php 
    $etat = array_key_exists('pseudo',$_SESSION);

?>

<?php if ($etat == true) { ?> 
    <div align="left">
        <p> Bienvenue <?php echo $_SESSION['pseudo']; ?> </p>
    </div>
    <form method="POST" action="index.php?action=deconnexion">
        <input type ="submit" name="deconnexion" value="Se déconnecter"/>
    </form>    
<?php }?>
    <div align="center">
        <h1>Blog de l'écrivain !</h1>
    </div>
    
    <p>Derniers billets du blog :</p>


    <?php while ($data = $posts->fetch()) { ?>
   
        <div class="news">
            <h3>
                <?= htmlspecialchars($data['title']) ?>
                le <?= $data['creation_date_fr'] ?>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($data['content'])) ?>
                <br />
                <a href="index.php?action=post&id=<?= $data['id'] ?>">Commentaires</a>
            </p>
        </div>
    <?php } ?>



 //Placer un footer 
    
    <a href="index.php?action=addArticle">Proposer un article </a>
    <br>
    <a href="index.php?action=connexionForm">Se connecter </a>
    <br>
    <a href ="index.php?action=formInscription"> S'inscrire </a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
