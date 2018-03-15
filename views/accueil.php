<?php ob_start(); ?>


<h1>Page d'accueil</h1>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>