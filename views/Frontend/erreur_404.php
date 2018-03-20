<?php ob_start(); ?>


<h1>404</h1>


<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>