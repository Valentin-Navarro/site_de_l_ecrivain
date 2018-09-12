<?php $title = 'Blog de l ecrivain '; ?>

<?php ob_start(); ?>

<?php if ($etat == true) { ?> 
    <div align="left">
        <p> Bienvenue <?php echo $pseudo; ?> </p> 
    </div> 
<?php }?>
    
<h1 class = "text-center mb-5">Blog de l'écrivain !</h1>
<h1 class = "text-center mb-5">Billet simple pour l'Alaska</h1>

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

<footer>
    <ul>
        <?php if(empty($_SESSION['pseudo'])) { ?>
                <a  href="index.php?action=connexion"> Connexion</a>
        <?php } else { ?>
                <a class="btn btn-success my-2 my-sm-0" href="index.php?action=deconnexion"> Deconnexion</a>
    <?php } ?>
    </ul>
    
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
