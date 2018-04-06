<!DOCTYPE html>
<html>
<head>
	<title>Site de l'écrivain</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  	<style>
  		body {
  	  padding-top: 5rem;
  	}
  	.starter-template 
    {
  	  padding: 3rem 1.5rem;
  	}
  	</style>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'.tinymce' });</script>
</head>
<body>

		<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php?action=listPosts">Accueil</a><br>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php?action=listPosts">Les articles</a><br>
      <a class="navbar-brand" href="index.php?action=formAddArticle">Proposer un article</a><br>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        </ul>
        <div class=" my-2 my-lg-0">
          <?php if(empty($_SESSION['pseudo'])) { ?>
            <a class="btn btn-success my-2 my-sm-0" href="index.php?action=connexion"></i> Connexion</a>
            <a class="btn btn-success my-2 my-sm-0" href="index.php?action=inscription">Inscription</a>
          <?php } else { ?>
            <a class="btn btn-success my-2 my-sm-0" href="index.php?action=deconnexion"></i> Deconnexion</a>
          <?php } ?>
        </div>
      </div>
    </nav>
      

	<main class="container">
		<div class="starter-template">
       <?= $content ?>
       
      </div>
    </main>  


	

	<footer>

	</footer>

</body>
</html>