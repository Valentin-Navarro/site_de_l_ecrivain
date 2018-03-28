<?php ob_start(); ?>


<h1>Erreur 404</h1>
<h2>Page Introuvable</h2>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>