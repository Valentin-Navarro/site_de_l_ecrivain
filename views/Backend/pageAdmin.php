<?php $title = 'Blog de l ecrivain '; ?>


<?php ob_start(); ?>

<p> Bienvenue <?php echo $pseudo; ?> </p>

<h5 class="display-4 text-center mb-5">Commentaires à modérer </h5>

<ul>
	<?php foreach ($comments as $comment ) { ?>
		<li>
			<?= htmlspecialchars($comment->id) ?> : <?= htmlspecialchars($comment->author)?> : <?= htmlspecialchars( $comment->comment) ?>
			<?php if ($comment->signaler == 1 ) { ?> 
				Commentaire signalé 
			<?php } ?> 
			- <a href="index.php?action=deleteComment&idComment=<?= $comment->id ?>">Supprimer</a>.
		</li>    
	<?php } ?>
</ul>  

<h5 class="display-4 text-center mb-5">Liste des Articles </h5>

<ul>
	<?php foreach ($billets as $billet) { ?>
		<li>
			<?= htmlspecialchars($billet->id) ?> : <?= htmlspecialchars($billet->title )?> 
			- <a href="index.php?action=editionArticle&id=<?= $billet->id ?>">Modifier l'article</a>
			<a href="index.php?action=deleteArticle&id=<?= $billet->id ?>">Supprimer l'article</a>
		</li>
	<?php } ?>  
</ul>

<br /><br />

<?php $content = ob_get_clean(); ?>

<?php require('views/frontend/template.php'); ?>



