<?php

require_once ('model/frontend/model.php');
require_once ('model/BilletManager.php');
require_once ('model/CommentManager.php');

function page404()
{
	require ('views/frontend/erreur_404.php');
}

function listPosts()
{
	$BilletManager = new BilletManager(); //Création d'un objet 
	$posts = $BilletManager-> getPosts(); // Appel d'une fonction de cet objet 

	require ('views/frontend/listPostsView.php');
}

function post($idBillet)
{
	$BilletManager = new BilletManager();
	$CommentManager = new CommentManager();

	$post = $BilletManager->getPost($idBillet);
	$comments = $CommentManager->getComments($idBillet);
	
	require ('views/frontend/postView.php');
}
  


function addComment ($idBillet,$author,$comment)
{
	$CommentManager = new CommentManager();

	$affectedLines = $CommentManager->postComment ($idBillet, $author, $comment);

	if ($affectedLines === false)
	{
		die ('Erreur d\' ajout du commentaire');
	}
	else
	{
		header ('location: index.php?action=post&id=' . $idBillet);
	}	
}

function connexionForm ()
{
	require ('views/frontend/connexion.php');
}


function formInscription()
{
	require ('views/frontend/inscription.php');
}

function signalerComment($idBillet)
{
	$alertComment = signalComment($idBillet);
	
	header ('location: index.php?action=listPosts');
	echo 'Vous avez bien signalé ce commentaire';
}

?>




