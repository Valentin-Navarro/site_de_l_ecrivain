<?php


function page404()
{
    http_response_code(404);
	require ('views/frontend/erreur_404.php');
}

function listPosts()
{
	$etat = array_key_exists('pseudo',$_SESSION);
	if ($etat === true) 
	{
		$pseudo = $_SESSION['pseudo'];
	}
	$manager = new Manager;
	$db = $manager->dbConnect();
	$billetManager = new BilletManager($db); //Création d'un objet 
	$posts = $billetManager->getPosts(); // Appel d'une fonction de cet objet 

	require ('views/frontend/listPostsView.php');
}

function post($idBillet)
{
	$manager = new Manager;
	$db = $manager->dbConnect();
	$billetManager = new BilletManager($db);
	$commentManager = new CommentManager($db);

	$post = $billetManager->getPost($idBillet);
	$comments = $commentManager->getComments($idBillet);
	
	require ('views/frontend/postView.php');
}
  


function addComment($idBillet,$author,$comment)
{
	$manager = new Manager;
	$db = $manager->dbConnect();
	$commentManager = new CommentManager($db);

	$affectedLines = $commentManager->postComment($idBillet, $author, $comment);

	if ($affectedLines === false)
	{
		die ('Erreur d\' ajout du commentaire');
	}
	else
	{
		header ('location: index.php?action=post&id=' . $idBillet);    // le . concatene 
	}	
}

function connexionForm()
{
	require ('views/frontend/connexion.php');
}


function signalerComment($idComment)
{
	$manager = new Manager;
	$db = $manager->dbConnect();
	$commentManager = new CommentManager($db);
	$alertComment = $commentManager->signalComment($idComment);
	
	header ('location: index.php?action=listPosts');
	
}

?>




