<?php


function page404()
{
	require ('views/frontend/erreur_404.php');
}

function listPosts()
{
	$etat = array_key_exists('pseudo',$_SESSION);
	if ($etat === true) 
	{
		$pseudo = $_SESSION['pseudo'];
	}
	

	$billetManager = new BilletManager(); //Création d'un objet 
	$posts = $billetManager->getPosts(); // Appel d'une fonction de cet objet 

	require ('views/frontend/listPostsView.php');
}

function post($idBillet)
{
	$billetManager = new BilletManager();
	$commentManager = new CommentManager();

	$post = $billetManager->getPost($idBillet);
	$comments = $commentManager->getComments($idBillet);
	
	require ('views/frontend/postView.php');
}
  


function addComment($idBillet,$author,$comment)
{
	$commentManager = new CommentManager();

	$affectedLines = $commentManager->postComment($idBillet, $author, $comment);

	if ($affectedLines === false)
	{
		die ('Erreur d\' ajout du commentaire');
	}
	else
	{
		header ('location: index.php?action=post&id=' . $idBillet);
	}	
}

function connexionForm()
{
	require ('views/frontend/connexion.php');
}


function formInscription()
{
	require ('views/frontend/inscription.php');
}

function signalerComment($idComment)
{
	$commentManager = new CommentManager();
	$alertComment = $commentManager->signalComment($idComment);
	
	header ('location: index.php?action=listPosts');
	
}

?>




